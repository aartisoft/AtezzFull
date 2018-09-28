<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
/**
 * Code Igniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		Rick Ellis
 * @copyright	Copyright (c) 2006, pMachine, Inc.
 * @license		http://www.codeignitor.com/user_guide/license.html
 * @link		http://www.codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * PayPal_Lib Controller Class (Paypal IPN Class)
 *
 * This CI library is based on the Paypal PHP class by Micah Carrick
 * See www.micahcarrick.com for the most recent version of this class
 * along with any applicable sample files and other documentaion.
 *
 * This file provides a neat and simple method to interface with paypal and
 * The paypal Instant Payment Notification (IPN) interface.  This file is
 * NOT intended to make the paypal integration "plug 'n' play". It still
 * requires the developer (that should be you) to understand the paypal
 * process and know the variables you want/need to pass to paypal to
 * achieve what you want.  
 *
 * This class handles the submission of an order to paypal as well as the
 * processing an Instant Payment Notification.
 * This class enables you to mark points and calculate the time difference
 * between them.  Memory consumption can also be displayed.
 *
 * The class requires the use of the PayPal_Lib config file.
 *
 * @package     CodeIgniter
 * @subpackage  Libraries
 * @category    Commerce
 * @author      Ran Aroussi <ran@aroussi.com>
 * @copyright   Copyright (c) 2006, http://aroussi.com/ci/
 *
 */

// ------------------------------------------------------------------------

class pagseguro_lib {


	var $CI;
	
	function __construct()
	{
		
		$this->CI =& get_instance();
		$this->CI->load->helper('url');
		$this->CI->load->helper('form');
		$this->CI->load->config('pagseguro_config');

        $sanbox = $this->CI->config->item('pagseguro_sandbox');
		$this->email = $this->CI->config->item('pagseguro_email');

		require_once "./vendor/autoload.php";
		\PagSeguro\Library::initialize();
		\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
		\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");

		\PagSeguro\Configuration\Configure::setEnvironment($sanbox ? 'sandbox' : 'production');//production or sandbox
		\PagSeguro\Configuration\Configure::setAccountCredentials(
			$this->CI->config->item('pagseguro_email'),
			$this->CI->config->item('pagseguro_token')
		);
		\PagSeguro\Configuration\Configure::setCharset('UTF-8');// UTF-8 or ISO-8859-1

	}

	function PegarSecao() 
	{
		try {
			$sessionCode = \PagSeguro\Services\Session::create(
				\PagSeguro\Configuration\Configure::getAccountCredentials()
			);
			return $sessionCode->getResult();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	function AdicionandoPlano($pediodicidade,$valor) 
	{
		$plan = new \PagSeguro\Domains\Requests\DirectPreApproval\Plan();
		$plan->setPreApproval()->setName('PLANO CUSTOM');
		$plan->setPreApproval()->setCharge('AUTO');
		$plan->setPreApproval()->setPeriod($pediodicidade);
		$plan->setPreApproval()->setAmountPerPayment($valor);
		$plan->setMaxUses(1);
		$plan->setReceiver()->withParameters($this->email);
		try {
			$response = $plan->register(
				\PagSeguro\Configuration\Configure::getAccountCredentials()
			);
			return $response->code;
		} catch (Exception $e) {
			return '';
		}
	}

	function AdicionandoAssinatura($token, $user, $data) 
	{
		$tirar = array("-","."," ","(",")");

		$cpf = str_replace($tirar, "", $user['cpf']);
		$document = new \PagSeguro\Domains\DirectPreApproval\Document();
		$document->withParameters('CPF', $cpf); //assinante

		$telefone = str_replace($tirar, "", $user['telefone']);
		$ddd = substr($telefone, 0, 2);
		$telefone = substr($telefone, 2);

		$cep = str_replace($tirar, "", $data['cep']);

		$preApproval = new \PagSeguro\Domains\Requests\DirectPreApproval\Accession();
		$preApproval->setPlan($user['planCode']);
		$preApproval->setReference($user['planId']);
		$preApproval->setSender()->setName($user['nome_cartao']);//assinante
		$preApproval->setSender()->setEmail($user['email']);//assinante
		$ip = '';
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		//$preApproval->setSender()->setIp($ip);//assinante
		$preApproval->setSender()->setIp('189.33.89.135');
		$preApproval->setSender()->setAddress()->withParameters($data['logradouro'], $data['numero'], $data['bairro'], $cep, $data['cidade'], $data['estado'],'BRA');//assinante
		$preApproval->setSender()->setDocuments($document);
		$preApproval->setSender()->setPhone()->withParameters($ddd, $telefone); //assinante
		$preApproval->setPaymentMethod()->setCreditCard()->setToken($token); //token do cartão de crédito gerado via javascript
		$preApproval->setPaymentMethod()->setCreditCard()->setHolder()->setName($user['nome_cartao']); //nome do titular do cartão de crédito
		$preApproval->setPaymentMethod()->setCreditCard()->setHolder()->setBirthDate($user['nascimento']); //data de nascimento do titular do cartão de crédito
		$preApproval->setPaymentMethod()->setCreditCard()->setHolder()->setDocuments($document);
		$preApproval->setPaymentMethod()->setCreditCard()->setHolder()->setPhone()->withParameters($ddd, $telefone); //telefone do titular do cartão de crédito
		$preApproval->setPaymentMethod()->setCreditCard()->setHolder()->setBillingAddress()->withParameters($data['logradouro'], $data['numero'], $data['bairro'], $cep, $data['cidade'], $data['estado'],'BRA');//assinante
		try {
			$response = $preApproval->register(
				\PagSeguro\Configuration\Configure::getAccountCredentials()
			);
			return $response->code;
		} catch (Exception $e) {
			return '';
		}
		//bodytag = str_replace("%body%", "black", "<body text='%body%'>");
		//substr('abcdef', 0, 2);substr('abcdef', 2);
	}

	function CancelarAssinatura($code) 
	{
		$status = new \PagSeguro\Domains\Requests\DirectPreApproval\Cancel();
		$status->setPreApprovalCode($code);
		try {
			$response = $status->register(
				\PagSeguro\Configuration\Configure::getAccountCredentials()
			);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}	

	
	function NotificacaoPagamento() 
	{
		try {
			if (\PagSeguro\Helpers\Xhr::hasPost()) {
				$response = \PagSeguro\Services\Transactions\Notification::check(
					\PagSeguro\Configuration\Configure::getAccountCredentials()
				);
			} else {
				throw new \InvalidArgumentException($_POST);
			}
			return $response;
		} catch (Exception $e) {
			return null;
		}
	}

	function NotificacaoAssinatura() 
	{
		try {
			if (\PagSeguro\Helpers\Xhr::hasPost()) {
				$response = \PagSeguro\Services\PreApproval\Notification::check(
					\PagSeguro\Configuration\Configure::getAccountCredentials()
				);
			} else {
				throw new \InvalidArgumentException($_POST);
			}
			return $response;
		} catch (Exception $e) {
			return null;
		}
	}		
}

?>