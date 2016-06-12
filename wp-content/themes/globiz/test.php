<?php
 
class Inchoo2_SimpleContact2_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
       //Get current layout state
        $this->loadLayout(); 
        $this->getLayout()->getBlock('head')->setTitle($this->__('Whats My RV Worth'));
         $this->renderLayout();
 
      
    }
 
    public function sendemailAction()
    {	
    if ($_POST["g-recaptcha-response"]) 
        { 
										$fname = $_POST['name'];
										$lname = $_POST['Lastname'];
										$email = $_POST['Email'];
										$haddress = $_POST['HomeAddress'];
										$City = $_POST['City'];
										$Zip = $_POST['Zip'];
										$Telephone = $_POST['Telephone'];
										$Year = $_POST['Year'];
										$Make = $_POST['Make'];
										$Model = $_POST['Model'];
										$Modeln = $_POST['Modeln'];
										$Slides = $_POST['Slides'];
										$Length = $_POST['Length'];
										$Miles = $_POST['Miles'];
										$Chassis = $_POST['Chassis'];
										$Engine_Size = $_POST['Engine_Size'];
										$Engine_Manufacturer = $_POST['Engine_Manufacturer'];
										$Exterior_Color = $_POST['Exterior_Color'];
										$Interior_Color = $_POST['Interior_Color'];
										$Generator_Size = $_POST['Generator_Size'];
										$General_Condition = $_POST['General_Condition'];
										$Trade_pay_off_amount = $_POST['Trade_pay_off_amount'];
									
										$Enquiry = $_POST['Enquiry'];
					$reg = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
				

						if(empty($fname)) 
								{  Mage::getSingleton('core/session')->addError('Something went wrong , check each field especially email and name1');
									//Mage::getSingleton('core/session')->addError(Mage::helper('simplecontact')->__('Something went wrong , check each field especially email and name'));
      							 // $this->_redirect('*/*/');
      							  $this->_redirect('simplecontact2');
								} 
   				 elseif(empty($lname) )
	  							 {   Mage::getSingleton('core/session')->addError('Something went wrong , check each field especially email and name2');
		 							 // Mage::getSingleton('core/session')->addError(Mage::helper('simplecontact')->__('Something went wrong , check each field especially email and name'));
       							 //$this->_redirect('*/*/');
      							  $this->_redirect('simplecontact2');
		 						  }

   				elseif(empty($email))
									{  Mage::getSingleton('core/session')->addError('Something went wrong , check each field especially email and name3');
										//Mage::getSingleton('core/session')->addError(Mage::helper('simplecontact')->__('Something went wrong,check each field especially Email and Name'));
    							    //$this->_redirect('*/*/');
    								    $this->_redirect('simplecontact2');
    								}
    				elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
									{  Mage::getSingleton('core/session')->addError('Something went wrong , check each field especially email and name4');
										//Mage::getSingleton('core/session')->addError(Mage::helper('simplecontact')->__('Something went wrong,check each field especially Email and Name'));
     							   //$this->_redirect('*/*/');
      							  $this->_redirect('simplecontact2');
    								}
   				else
   							 {  
      							 $receiveEmail='reply@poulsborv.com';
                                                       // $receiveEmail='gaurav.gupta@promatics.in';
					
										$message .= "Name: $fname\r\n";
										$message .= "Lastname: $lname\r\n";
										$message .= "Email: $email \r\n";
										$message .= "homeaddress: $haddress \r\n";
										$message .= "City: $City \r\n";
										$message .= "Zip: $Zip \r\n";
										$message .= "Telephone: $Telephone \r\n";
										$message .= "Year: $Year \r\n";
										$message .= "Make: $Make \r\n";
										$message .= "Model: $Model \r\n";
										$message .= "Modeln: $Modeln \r\n";
										$message .= "No. of Slides: $Slides \r\n";
										$message .= "Length: $Length \r\n";
										$message .= "Miles: $Miles \r\n";
										$message .= "Chassis: $Chassis \r\n";
										$message .= "Engine_Size: $Engine_Size \r\n";
										$message .= "Engine_Manufacturer: $Engine_Manufacturer \r\n";
										$message .= "Exterior_Color: $Exterior_Color \r\n";
										$message .= "Interior_Color: $Interior_Color \r\n";
										$message .= "Generator_Size: $Generator_Size \r\n";
										$message .= "General_Condition: $General_Condition \r\n";
										$message .= "Trade_pay_off_amount: $Trade_pay_off_amount \r\n";
										$message .= "Enquiry: $Enquiry \r\n";
										 $subject    = 'Whats my RV Worth Inquire';
										$headers = "From: HEADER ALASKA BUYERS"; 
										$flgchk = mail ("$receiveEmail", "$subject", "$message","$headers"); 
					
								/*if($flgchk)
								{	
										$this->_redirect('thank_you');
											}
    							}*/
    							
    							if($flgchk)
											{	
										//$this->_redirect('thank_you');
										$this->_redirect('alaska_contact/index/alert',array('email'=> $receiveEmail));
                                                                          //      $this->_redirect('form-thank-you/?___store=default');
											}
								}
    							
    							
    		}
    		else{
	       Mage::getSingleton('core/session')->addError('Something went wrong, check Captcha.');
       // Mage::getSingleton('core/session')->addError(Mage::helper('simplecontact1')->__('Something went wrong, check Captcha.'));
        $this->_redirect('*/*/');
        $this->_redirect('simplecontact2');
	         }
	  }
	  
	  
	  public function alertAction()
	{
		$email=$this->getRequest()->getParam('email');
        $eeeem=Mage::getStoreConfig('trans_email/ident_custom1/email', $storeId);
        $subject="Notification";
        $headers="from: inquire@poulsborv.com";
        $message .= "You have one mail in ".$email;
       $flgchk = mail ("$eeeem", "$subject", "$message","$headers");  
      if($flgchk)
											{	
										$this->_redirect('thank_you');
                                                                     //              $this->_redirect('form-thank-you/?___store=default');
											}
	}
	  
	  
	  
	  
	  
	public function redirectAction()
	{
	   $this->loadLayout(); 
	   // This will show title on the top
		$this->getLayout()->getBlock('head')->setTitle($this->__('Collision Repair'));
         $this->renderLayout();
	
	}
	public function redirect1Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	public function redirect2Action()
	{
	   $this->loadLayout(); 
	    // This will show title on the top
		$this->getLayout()->getBlock('head')->setTitle($this->__('Canada Rv Buyer'));
         $this->renderLayout();
	
	}
	public function redirect3Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	public function redirect4Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	public function redirect5Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	public function redirect6Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	public function redirect7Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	public function redirect8Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect9Action()
	{
	   $this->loadLayout(); 
	   $this->getLayout()->getBlock('head')->setTitle($this->__('Contact Us'));
         $this->renderLayout();
	
	}
	public function redirect10Action()
	{
		$this->loadLayout(); 
		// This will show title on the top
		$this->getLayout()->getBlock('head')->setTitle($this->__('Diesel'));
		$this->renderLayout();
	
	}
	
	public function site_mapAction()
	{
	   $this->loadLayout();
	   	// This will show title on the top
		$this->getLayout()->getBlock('head')->setTitle($this->__('Site Map'));
		$this->renderLayout();
	
	}
	
	public function redirect11Action()
	{
	   $this->loadLayout(); 
	   $this->getLayout()->getBlock('head')->setTitle($this->__('Class As'));
         $this->renderLayout();
	
	}
	
	public function redirect12Action()
	{
	   $this->loadLayout(); 
	   $this->getLayout()->getBlock('head')->setTitle($this->__('Class Bs'));
         $this->renderLayout();
	
	}
	
	public function redirect13Action()
	{
	   $this->loadLayout(); 
	   $this->getLayout()->getBlock('head')->setTitle($this->__('Class Cs'));
       $this->renderLayout();
	
	}
	
	public function redirect14Action()
	{
	   $this->loadLayout(); 
	   $this->getLayout()->getBlock('head')->setTitle($this->__('Fifth Wheels'));
         $this->renderLayout();
	
	}
	
	public function redirect15Action()
	{
	   $this->loadLayout(); 
	   $this->getLayout()->getBlock('head')->setTitle($this->__('Toy Haulers'));
         $this->renderLayout();
	
	}
	
	public function redirect16Action()
	{
	   $this->loadLayout(); 
	   $this->getLayout()->getBlock('head')->setTitle($this->__('Travel Trailers'));
         $this->renderLayout();
	
	}
	
	public function redirect17Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect18Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect19Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect20Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect21Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect22Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect23Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect24Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect25Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
// Links for Class Bs .................
	
	public function redirect26Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect27Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect28Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect29Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect30Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect31Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect32Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
// Links for class Cs internal links.....

	public function redirect33Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect34Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect35Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect36Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect37Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect38Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect39Action()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect40Action()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect41Action()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect42Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect43Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}

// links for Diesel	
	public function redirect44Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect45Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect46Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect47Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	public function redirect48Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	public function redirect49Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	public function redirect50Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect51Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect52Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect53Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect54Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	
	public function redirect55Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function redirect56Action()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function rvseminarsAction()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function flyanddriveAction()
	{
	   $this->loadLayout(); 
	   $this->getLayout()->getBlock('head')->setTitle($this->__('Fly and Drive'));
       $this->renderLayout();
	
	}
	
	public function coachmenrvAction()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function fleetwoodrvAction()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function forestriverrvAction()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function pleasurewayAction()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function roadtrekrvAction()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function thorrvmotorhomesAction()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function tiffinmotorhomesAction()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function winnebagorvAction()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function customercareAction()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function cedercreekAction()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function halftontowablesAction()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function cascadeAction()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function rainierAction()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function rvservicevideosAction()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function rvpartspecialAction()
	{
	   $this->loadLayout(); 
	   //title of the page
	   	$this->getLayout()->getBlock('head')->setTitle($this->__('Rv Parts Specials'));
		$this->renderLayout();
	
	}
	
	public function dutchmenAction()
	{
	   $this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	
	public function rvservicespecialsAction()
	{
		$this->loadLayout(); 
			   //title of the page
	   	$this->getLayout()->getBlock('head')->setTitle($this->__('Rv Service Specials'));
         $this->renderLayout();
	
	}
	
	public function rvpartsstoreAction()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	
	public function currentpromoAction()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	
	public function rvspecialAction()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	
	
	public function currentsaleAction()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	
	
	public function rvstorageAction()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	
	public function kmcampAction()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	
	public function everettAction()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function faqAction()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function fifeAction()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	
	public function kentAction()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function mtvernonAction()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function rvingAction()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	
	
	public function servicetipswinterAction()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}


	public function tradeinAction()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	
	public function auburnAction()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function partscenterAction()
	{
		$this->loadLayout(); 
		//title of the page
	   	$this->getLayout()->getBlock('head')->setTitle($this->__('Parts Centers'));
         $this->renderLayout();
	
	}
	
	public function partsonlineAction()
	{
		$this->loadLayout(); 
		//title of the page
	   	$this->getLayout()->getBlock('head')->setTitle($this->__('Parts Online'));
         $this->renderLayout();
	
	}
	
	public function internetspecialAction()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function partsstoreAction()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	
	public function partsresultAction()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function partsproductAction()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function partsresult2Action()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	
	public function partsproduct2Action()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function partsresult3Action()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	public function partsresult4Action()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function thankyouAction()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	
	public function testAction()
	{
		$this->loadLayout(); 
       	  $this->renderLayout();
	
	}
	
	
	public function xmlAction()
	{ 
		//start
		          $n= "\r\n";

		 $myfile="subhav/all_products.xml";
			unlink("subhav/all_products.xml");
		 
			   $xyz= fopen($myfile, 'w') or die("Unable to open file!");
			fwrite($xyz, "<DataSet>");
			fwrite($xyz, $n);
			fwrite($xyz, '<xs:schema xmlns:xs="http://www.w3.org/2001/XMLSchema"
    targetNamespace="http://codereq.com/mathservice/schemas" id="NewDataSet">');
			fwrite($xyz, $n);
			fwrite($xyz, '<xs:element name="NewDataSet">');
			fwrite($xyz, $n);
         
         fwrite($xyz, "<xs:complexType>");
         fwrite($xyz, $n);
         fwrite($xyz, "<xs:choice minOccurs='0' maxOccurs='unbounded'>");
			fwrite($xyz, $n);
			fwrite($xyz, "<xs:element name='Table'>");
			fwrite($xyz, $n);
			fwrite($xyz, "<xs:complexType>");
			fwrite($xyz, $n);
         
         fwrite($xyz, "<xs:sequence>");
         fwrite($xyz, $n);
         fwrite($xyz, "<xs:element name='Awnings' type='xs:int' minOccurs='0'/>");
			fwrite($xyz, $n);
			fwrite($xyz, "<xs:element name='Class' type='xs:string' minOccurs='0'/>");
			fwrite($xyz, $n);
			fwrite($xyz, "<xs:element name='DealerIdentifyer' type='xs:string' minOccurs='0'/>");
			fwrite($xyz, $n);
         
         fwrite($xyz, "<xs:element name='Description' type='xs:string' minOccurs='0'/>");
         fwrite($xyz, $n);
         fwrite($xyz, "<xs:element name='EngineMake' type='xs:string' minOccurs='0'/>");
			fwrite($xyz, $n);
			fwrite($xyz, "<xs:element name='EngineType' type='xs:string' minOccurs='0'/>");
			fwrite($xyz, $n);
			fwrite($xyz, "<xs:element name='FuelType' type='xs:string' minOccurs='0'/>");
			fwrite($xyz, $n);
         
         fwrite($xyz, "<xs:element name='Length' type='xs:string' minOccurs='0'/>");
         fwrite($xyz, $n);
         fwrite($xyz, "<xs:element name='LevelingJacks' type='xs:string' minOccurs='0'/>");
			fwrite($xyz, $n);
		fwrite($xyz, "<xs:element name='Manufacturer' type='xs:string' minOccurs='0'/>");
			fwrite($xyz, $n);
		fwrite($xyz, "<xs:element name='MakeName' type='xs:string' minOccurs='0'/>");
			fwrite($xyz, $n);
		 fwrite($xyz, "<xs:element name='ModelName' type='xs:string' minOccurs='0'/>");
         fwrite($xyz, $n);
		 
		fwrite($xyz, "<xs:element name='Mileage' type='xs:string' minOccurs='0'/>");
			fwrite($xyz, $n);
         
        
		 fwrite($xyz, "<xs:element name='Model#' type='xs:string' minOccurs='0'/>");
			fwrite($xyz, $n);
          fwrite($xyz, "<xs:element name='Condition' type='xs:int' minOccurs='0'/>");
         fwrite($xyz, $n);
         
         fwrite($xyz, "<xs:element name='NumAirConditioners' type='xs:int' minOccurs='0'/>");
			fwrite($xyz, $n);
			fwrite($xyz, "<xs:element name='Phone' type='xs:string' minOccurs='0'/>");
			fwrite($xyz, $n);
			fwrite($xyz, "<xs:element name='Price' type='xs:decimal' minOccurs='0'/>");
			fwrite($xyz, $n);
         
         fwrite($xyz, "<xs:element name='SelfContained' type='xs:string' minOccurs='0'/>");
         fwrite($xyz, $n);
          fwrite($xyz, "<xs:element name='SleepingCapacity' type='xs:string' minOccurs='0'/>");
         fwrite($xyz, $n);
         fwrite($xyz, "<xs:element name='SlideOuts' type='xs:string' minOccurs='0'/>");
			fwrite($xyz, $n);
			fwrite($xyz, "<xs:element name='StockNumber' type='xs:string' minOccurs='0'/>");
			fwrite($xyz, $n);
			fwrite($xyz, "<xs:element name='WaterCapacity' type='xs:string' minOccurs='0'/>");
			fwrite($xyz, $n);
         
         fwrite($xyz, "<xs:element name='MfrSerialNumber' type='xs:string' minOccurs='0'/>");
         fwrite($xyz, $n);
         
          fwrite($xyz, "<xs:element name='Year' type='xs:string' minOccurs='0'/>");
			fwrite($xyz, $n);
			fwrite($xyz, "<xs:element name='ExteriorColor' type='xs:string' minOccurs='0'/>");
			fwrite($xyz, $n);
			fwrite($xyz, "<xs:element name='InteriorColor' type='xs:string' minOccurs='0'/>");
			fwrite($xyz, $n);
         
         fwrite($xyz, "<xs:element name='UniqueID' type='xs:int' minOccurs='0'/>");
         fwrite($xyz, $n);
          fwrite($xyz, "<xs:element name='ItemUrl' type='xs:string' minOccurs='0'/>");
         fwrite($xyz, $n);
         fwrite($xyz, "<xs:element name='City' type='xs:string' minOccurs='0'/>");
			fwrite($xyz, $n);
			fwrite($xyz, "<xs:element name='StateCode' type='xs:string' minOccurs='0'/>");
			fwrite($xyz, $n);
			fwrite($xyz, "<xs:element name='ZipCode' type='xs:string' minOccurs='0'/>");
			fwrite($xyz, $n);
         
         fwrite($xyz, "<xs:element name='Photo1' type='xs:string' minOccurs='0'/>");
         fwrite($xyz, $n);
         
          fwrite($xyz, "<xs:element name='Photo2' type='xs:string' minOccurs='0'/>");
			fwrite($xyz, $n);
			fwrite($xyz, "<xs:element name='Photo3' type='xs:string' minOccurs='0'/>");
			fwrite($xyz, $n);
			fwrite($xyz, "<xs:element name='Photo4' type='xs:string' minOccurs='0'/>");
			fwrite($xyz, $n);
			
			fwrite($xyz, "</xs:sequence>");
         fwrite($xyz, $n);
         
          fwrite($xyz, "</xs:complexType>");
			fwrite($xyz, $n);
			fwrite($xyz, "</xs:element>");
			fwrite($xyz, $n);
			fwrite($xyz, "</xs:choice>");
			fwrite($xyz, $n);
			
			 fwrite($xyz, "</xs:complexType>");
			fwrite($xyz, $n);
			fwrite($xyz, "</xs:element>");
			fwrite($xyz, $n);
			fwrite($xyz, "</xs:schema>");
			fwrite($xyz, $n);
			
			fwrite($xyz, '<diffgr:diffgram xmlns:msdata="urn:schemas-microsoft-com:xml-msdata" xmlns:diffgr= "urn:schemas-microsoft-com:xml-diffgram-v1">');
         fwrite($xyz, $n);
         
          fwrite($xyz, "<NewDataSet>");
			
         
                  $_productCollection= Mage::getModel('catalog/product')->getCollection();
		$_productCollection->addAttributeToSelect('*')
				->addStoreFilter(1);


			$i = 0;
			foreach ( $_productCollection as $_product )
			{  $status=$_product->getAttributeText('status');
		if($status != 'Disabled'){
				fwrite($xyz, $n);
				
				$j=$i+1;
				//$tab="<Table diffgr:id=Table".$j."msdata:rowOrder=".$i.">";
//echo $tab;die;
			fwrite($xyz,'<Table diffgr:id="Table'.$j.'" msdata:rowOrder="'.$i.'">');
			fwrite($xyz, $n);
//fwrite($xyz, "<requestdate>");
         //  $t = $model->getData(timestamp);
          // fwrite($xyz, $t);
          //  fwrite($xyz, "</requestdate>");
          //  fwrite($xyz, $n);
          
                 //if($model)
           //{
			   fwrite($xyz, $n);
			   fwrite($xyz, "	<Awnings>");
			       
			 $m=$_product->getAwnings();
		  fwrite($xyz, $m);
			       
			        fwrite($xyz, "</Awnings>");
			        fwrite($xyz, $n);
		

			    fwrite($xyz, "<Class>");
		$m1=$_product->getAttributeText('rv_type');
		  fwrite($xyz, $m1);
		  fwrite($xyz, "</Class>");
		   fwrite($xyz, $n);
			    fwrite($xyz, "<DealerIdentifyer>");
		//$mo=$cProduct->getModel();
		  fwrite($xyz, "Poulsbo RV");
		  fwrite($xyz, "</DealerIdentifyer>");
		    fwrite($xyz, $n);
		    fwrite($xyz, "<Description>");
		    $mo1=htmlspecialchars($_product->getDescription());
		  fwrite($xyz,$mo1);
		 
		  fwrite($xyz, "</Description>");
		    fwrite($xyz, $n);
		    
		    
		  	    fwrite($xyz, "<EngineMake>");
		$con=$_product->getEnginemake();
		  fwrite($xyz, $con);
		  fwrite($xyz, "</EngineMake>");
		    fwrite($xyz, $n);
		   
		    
		  	    fwrite($xyz, "<EngineType>");
		$fu=$_product->getEnginetype();
		  fwrite($xyz, $fu);
		  fwrite($xyz, "</EngineType>");
		    fwrite($xyz, $n);
		    
		     fwrite($xyz, "<FuelType>");
		$p=$_product->getAttributeText('fuel');
		  fwrite($xyz, $p);
		  fwrite($xyz, "</FuelType>");
		    fwrite($xyz, $n);
	    	     fwrite($xyz, "<Length>");
		$p1=$_product->getLength();
		$p0=floatval($p1);
		  fwrite($xyz, $p0);
		  fwrite($xyz, "</Length>");
		    fwrite($xyz, $n);
		    
		    		     fwrite($xyz, "<LevelingJacks>");
		    $lj=$_product->getLevelingjacks();
		    if($lj==Yes)
		    { 
				$lj1='Y';
			}
			if($lj==No)
			{
				$lj1='N';
			}
		  fwrite($xyz, $lj1);
		  fwrite($xyz, "</LevelingJacks>");
		    fwrite($xyz, $n);
			
		  fwrite($xyz, "<Manufacturer>");
            $mn=$_product->getAttributeText('manufacturer');
		  fwrite($xyz, $mn);
           fwrite($xyz, "</Manufacturer>");
              fwrite($xyz, $n);
			  
           fwrite($xyz, "<MakeName>");
            $mn=$_product->getAttributeText('manufacturer');
		  fwrite($xyz, $mn);
           fwrite($xyz, "</MakeName>");
              fwrite($xyz, $n);
           
		   fwrite($xyz, "<ModelName>");
            $mn=$_product->getAttributeText('model');
		  fwrite($xyz, $mn);
           fwrite($xyz, "</ModelName>");
              fwrite($xyz, $n);
			  
			  fwrite($xyz, "<Model#>");
            $mn=$_product->getAttributeText('modeln');
		  fwrite($xyz, $mn);
           fwrite($xyz, "</Model#>");
              fwrite($xyz, $n);
			  
            fwrite($xyz, "<Mileage>");
                $mile=$_product->getMiles();
                fwrite($xyz, $mile);
            fwrite($xyz, "</Mileage>");
			   fwrite($xyz, $n);
			   
            /*fwrite($xyz, "	<ModelName>");
            $mdl=$_product->getAttributeText('modeln');
		  fwrite($xyz, $mdl);
             fwrite($xyz, "</ModelName>");
                fwrite($xyz, $n);*/
       
            fwrite($xyz, "<Condition>");
             $con=$_product->getAttributeText('condition');
		  fwrite($xyz, $con);
             fwrite($xyz, "</Condition>");
                fwrite($xyz, $n);
           fwrite($xyz, "<NumAirConditioners>");
		$fu=$_product->getAc();
		  fwrite($xyz, $fu);
		  fwrite($xyz, "</NumAirConditioners>");
		    fwrite($xyz, $n);
		    
		     fwrite($xyz, "<Phone>");
		
		  fwrite($xyz, "8883557491");
		  fwrite($xyz, "</Phone>");
		    fwrite($xyz, $n);
	    	     fwrite($xyz, "<Price>");
		$p4=$_product->getPrice();
		  fwrite($xyz, $p4);
		  fwrite($xyz, "</Price>");
		    fwrite($xyz, $n);
		 fwrite($xyz, "<SelfContained>");
		  fwrite($xyz, "N");
		  fwrite($xyz, "</SelfContained>");
		    fwrite($xyz, $n);
		    
		     fwrite($xyz, "<SleepingCapacity>");
		$slep=$_product->getAttributeText('sleeping_capacity');
		  fwrite($xyz, $slep);
		  fwrite($xyz, "</SleepingCapacity>");
		  fwrite($xyz, $n);
		  
		  fwrite($xyz, "<SlideOuts>");
		$slide=$_product->getAttributeText('slides');
		  fwrite($xyz, $slide);
		  fwrite($xyz, "</SlideOuts>");
		  fwrite($xyz, $n);
		    		    
	    	     fwrite($xyz, "<StockNumber>");
		$stck=$_product->getStock();
		  fwrite($xyz, $stck);
		  fwrite($xyz, "</StockNumber>");
		    fwrite($xyz, $n);
		fwrite($xyz, "<WaterCapacity>");
		   $water=$_product->getWatercapacity();
			fwrite($xyz, $water);
             fwrite($xyz, "</WaterCapacity>");
                fwrite($xyz, $n);
			fwrite($xyz, "<MfrSerialNumber>");
				$vin=$_product->getVin();
		  fwrite($xyz, $vin);										
		  fwrite($xyz, "</MfrSerialNumber>");

		    fwrite($xyz, $n);
		    
		     fwrite($xyz, "<Year>");
		
		  $year=$_product->getYear();
		  $yr=floatval($year);
		  fwrite($xyz, $yr);
		  fwrite($xyz, "</Year>");
		    fwrite($xyz, $n);
	    	     fwrite($xyz, "<ExteriorColor>");
		$extc=$_product->getExteriorcolor();
		  fwrite($xyz, $extc);
		  fwrite($xyz, "</ExteriorColor>");
		
		    fwrite($xyz, $n);
		    
		     fwrite($xyz, "<UniqueID>");
		
		  fwrite($xyz, $stck);
		  fwrite($xyz, "</UniqueID>");
		    fwrite($xyz, $n);
	    	     fwrite($xyz, "<ItemUrl>");
		$url=$_product->getProductUrl();
		  fwrite($xyz, $url);
		  fwrite($xyz, "</ItemUrl>");
		    fwrite($xyz, $n);

			fwrite($xyz, "<City>");
		$city=$_product->getAttributeText('location');
		 fwrite($xyz, $city);
		  fwrite($xyz, "</City>");
		
		    fwrite($xyz, $n);
	    	     fwrite($xyz, "<StateCode>");
		
		  fwrite($xyz, "WA");
		  fwrite($xyz, "</StateCode>");
		    fwrite($xyz, $n);
		    
		     fwrite($xyz, "<ZipCode>");
		//$p3=$_product->getSleepingcapacity();
		 fwrite($xyz,"98101");
		  fwrite($xyz, "</ZipCode>");
		    fwrite($xyz, $n);
	    	     fwrite($xyz, "<CountryCode>");
		//$url=$_product->getUrl();
		  fwrite($xyz, "USA");
		  fwrite($xyz, "</CountryCode>");
		   
		     
		       fwrite($xyz, $n);
		       $product = Mage::getModel('catalog/product')->load($_product->getId());
		    $immmggg=$product->getMediaGalleryImages();
		    
		    $k=1; foreach($immmggg as $_image){ 
				if($k<=15){
				 $immgg1122= $_image->getUrl();
				 $photo="<Photo".$k.">";
	    	     fwrite($xyz, $photo);
	    	     	$p100=str_replace("leadfromweb","poulsborv",$immgg1122);
	    	     	fwrite($xyz, $p100);
	    	     	$photo1="</Photo".$k.">";
	    	fwrite($xyz, $photo1);
	    	fwrite($xyz, $n);
		$k++;
		}
	  }
	   
	    	 
		    fwrite($xyz, "</Table>");
		  fwrite($xyz, $n);
		  $i++;
	}
	}
			  
		  fwrite($xyz, "</NewDataSet>");
		  fwrite($xyz, $n);
		 fwrite($xyz, "</diffgr:diffgram>");
		 fwrite($xyz, $n);
		 fwrite($xyz, "</DataSet>");
		 // Mage::getSingleton('core/session')->addSuccess(Mage::helper('simplecontact')->__('file has been created'));
          //downloader($xyz, $myfile, 'application/xml'); 
        //  $this->_redirect('/all_products.xml');
		//$this->_redirect('*/*/downloader');
		header("location: https://www.poulsborv.com/subhav/all_products.xml");
    	//--------------
	  }
	  
	  public function csvAction()
	  {
		$file_path = "sample.csv";
		//file path of the CSV file in which the data to be saved
		$mage_csv = new Varien_File_Csv(); //mage CSV
		//$products_model = Mage::getModel('catalog/product'); //get products model
		$_productCollection= Mage::getModel('catalog/product')->getCollection();
		$_productCollection->addAttributeToSelect('*')
							->addStoreFilter(1);
		$products_row = array();
		$data = array();
		$data['Awing'] = 'Awnings';
		$data['Unit Type'] = 'Unit Type';
		$data['DealerIdentifyer'] = 'DealerIdentifyer';
		$data['Vehicle Description'] = 'Vehicle Description';
		$data['Engine Manufacturer'] = 'Engine Manufacturer';
		$data['Engine Model'] = 'Engine Model';
		$data['Fuel Type'] = 'Fuel Type';
		$data['Length'] = 'Length';
		$data['Manufacturer'] = 'Manufacturer';
		$data['Mileage'] = 'Mileage';
		$data['Model#'] = 'Model#';
		$data['ModelName'] = 'ModelName';
		$data['Condition'] = 'Condition';
		$data['NumAirConditioners'] = 'NumAirConditioners';
		$data['Phone'] = 'Phone';
		$data['MSRP Price'] = 'MSRP Price';
		$data['SelfContained'] = 'SelfContained';
		$data['Sleep Capacity'] = 'Sleep Capacity';
		$data['SlideOuts'] = 'SlideOuts';
		$data['Stock Number'] = 'Stock Number';
		$data['Water Capacity'] = 'Water Capacity';
		$data['VIN'] = 'VIN';
		$data['Year'] = 'Year';
		$data['Exterior Color'] = 'Exterior Color';
		$data['Chassis'] = 'Chassis';
		$data['Interior Color'] = 'Interior Color';
		$data['ProductId'] = 'ProductId';
		$data['Unique ID'] = 'Unique ID';
		$data['ItemUrl'] = 'ItemUrl';
		$data['Lot Location'] = 'Lot Location';
		$data['StateCode'] = 'StateCode';
		$data['ZipCode'] = 'ZipCode';
		$data['CountryCode'] = 'CountryCode';
		$data['Picture URLs'] = 'Picture URLs';	
		$data['ImageURLs']= 'ImageURLs';
	
		
		
	
		
		
		$products_row[] = $data;
		foreach ($_productCollection as $_product)
		{
		$status=$_product->getAttributeText('status');
		if($status != 'Disabled'){
                $description = str_replace(array("\n", "\r"), '!', $_product->getDescription());

		//$data = array();
		$data['Awing'] = $_product->getAwnings();
		$data['Unit Type'] =$_product->getAttributeText('rv_type');;
		$data['DealerIdentifyer'] = 'Poulsbo RV';
		$data['Vehicle Description'] = $description;
		$data['Engine Manufacturer'] = $_product->getEnginemake();
		$data['Engine Model'] = $_product->getEnginetype();
		$data['Fuel Type'] = $_product->getAttributeText('fuel');
		$data['Length'] = $_product->getLength();
		$data['Manufacturer'] = $_product->getAttributeText('manufacturer');
		$data['Mileage'] =$_product->getMiles();;
		$data['Model#'] = $_product->getAttributeText('modeln');
		$data['ModelName'] = $_product->getAttributeText('model');
		$data['Condition'] = $_product->getAttributeText('condition');
		$data['NumAirConditioners'] = $_product->getAc();
		$data['Phone'] = '8883557491';
		$data['MSRP Price'] = $_product->getMsrp();
		$data['SelfContained'] ="N";
		$data['Sleep Capacity'] = $_product->getAttributeText('sleeping_capacity');
		$data['SlideOuts'] = $_product->getAttributeText('slides');
		$data['Stock Number'] = $_product->getStock();
		$data['Water Capacity'] = $_product->getWatercapacity();
		$data['VIN'] =$_product->getVin();;
		$data['Year'] = $_product->getYear();
		$data['Exterior Color'] = $_product->getExteriorcolor();
		$data['Chassis'] = $_product->getChassismodel ();
		$data['Interior Color'] = $_product->getAttributeText('color');
		$data['ProductId'] = $_product->getId();
		$data['Unique ID'] = $_product->getStock();
		$data['ItemUrl'] = $_product->getProductUrl();
		$data['Lot Location'] = $_product->getAttributeText('location');
		$data['StateCode'] = 'WA';
		$data['ZipCode'] = '98101';
		$data['CountryCode'] = 'USA';
		$data['Picture URLs'] = '';
		//$data['ImageURLs'] = Mage::helper('catalog/image')->init($_product, 'image');
		                           
       //$data['ImageURLs'] = $_product->getImage();
		//$data['ImageURLs'] = 'https://www.poulsborv.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95'.$_product->getImage();
		$product = Mage::getModel('catalog/product')->load($_product->getId());
		$immmggg=$product->getMediaGalleryImages();
		//echo 'ravi<pre>';	
		//print_r($immmggg);		    
		$k=1; 
			foreach($immmggg as $_image)
			{ 
				if($k<=10){
					if($k==1)
					{
						$image=$_image->getUrl();
					}
					else
					{
					$immgg1122 = $_image->getUrl();
					 $image=$image.'|'.$immgg1122;
				    }
					$k++;
				}
			}
			$data['ImageURLs']=$image;
		
			$products_row[] = $data;
		}
		}
		//write to csv file
		//print_r($products_row);
		$mage_csv->saveData($file_path, $products_row); //note $products_row will be two dimensional array
		$this->_redirect('*/*/downloader');  
  }
	  
public function downloaderAction($data, $filename = true, $content = 'application/x-octet-stream')
{
$path = "sample.csv";
$filename = "sample.csv";
header('Content-Transfer-Encoding: binary');  // For Gecko browsers mainly
header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($path)) . ' GMT');
header('Accept-Ranges: bytes');  // Allow support for download resume
header('Content-Length: ' . filesize($path));  // File size
header('Content-Encoding: none');
header('Content-Type: application/xml');  // Change the mime type if the file is not PDF
header('Content-Disposition: attachment; filename=' . $filename);  // Make the browser display the Save As dialog
readfile($path); 

   }
 
		
		
		
		
		
		

	






	/*public function partsresult5Action()
	{
		$this->loadLayout(); 
         $this->renderLayout();
	
	}
	public function xmlAction()
	{ echo "subhav";

// Prepare collection
$_productCollection= Mage::getModel('catalog/product')->getCollection();
$_productCollection->addAttributeToSelect('*');

$i = 0;
foreach ( $_productCollection as $_product ) {
	
		$categoryIds = $_product->getCategoryIds();
		$category= Mage::getModel('catalog/category')->load($categoryId);
		echo $category->getName();
		echo "<br>";

// Prepare array of variables to grow XML file
$v['sku'] = $_product->getSku();
$v['product_name'] = $_product->getName();
$v['type'] = $_product->getTypeId();
$v['description'] = $_product->getDescription();
$v['short_description'] = $_product->getShortDescription();
$v['meta_title'] = $_product->getMetaTitle();
$v['meta_description'] = $_product->getMetaDescription();
$v['meta_keyword'] = $_product->getMetaKeyword();
$v['created_at'] = $_product->getCreatedAt();
$v['updated_at'] = $_product->getUpdatedAt();
$v['url_path'] = $_urlPath . $_product->geturlpath();
$v['image'] = $_imagePath . $_product->getImage();
$v['image_label'] = $_product->getImageLabel();
$v['price'] = $_product->getPrice();
$v['special_price'] = $_product->getSpecialPrice();
$v['weight'] = $_product->getWeight();

// Get the Magento categories for the product
//$categoryIds = $_product->getCategoryIds();

//foreach($categoryIds as $categoryId) {
//$category= Mage::getModel('catalog/category')->load($categoryId);

//echo $v['categories'][$_product->getSku()][] = $category->getName();
//$product=$category->getProductCollection($categoryId);
//foreach($product as $pro)
//{
//print_r($pro);
//echo "<br>";
//echo $pro->getName();
//echo "<br>";
//}
//}
echo "<subhav>";
echo "<br>";

// If product is downloadable get some informations about links added
if ( $_product->getTypeId() == "downloadable" ) {
$_links= Mage::getModel('downloadable/product_type')->getLinks( $_product);
foreach ( $_links as $_link )
echo $v['available_formats'][$_product->getSku()][] = $_link->getTitle();
echo "<br>";
}

// Prepare XML file to save
echo $xmlFile = $_xmlPath . "/" . $_product->getSku() . ".xml";

$doc = new DomDocument('1.0', 'UTF-8');
$doc->preserveWhiteSpace = false;
$doc->formatOutput = true;

$root = $doc->createElement('product');
$root = $doc->appendChild($root);

$occ = $doc->createElement('root');
$occ = $root->appendChild($occ);

foreach ( $v as $fieldName => $fieldValue ) {
$child = $doc->createElement($fieldName);
$child = $occ->appendChild($child);

if ( is_array($fieldValue) ) {
echo $value= $doc->createTextNode(implode( "|", $fieldValue[$_product->getSku()] ));
echo $value = $child->appendChild($value);
} else {
echo $value = $doc->createTextNode($fieldValue);
echo $value = $child->appendChild($value);
}

}

// Save each product as XML file
$doc->save( $xmlFile );

Mage::log( "File " . $i . ": ". $_product->getSku(), null, $_logFileName );



Mage::log( "Export done", null, $_logFileName );


	
	}
}

	
	*/
 }
 ?>
