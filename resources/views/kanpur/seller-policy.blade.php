@extends("layout")
@section('content')
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url('kanpurizeMarketplace') }}" title="marketplace in kanpur">Home</a></li>
                            <li class="active"><a href="{{ url('kanpurize_sellerpolicy') }}" title="Seller Policy in kanpur">Seller Policy</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Seller Policy</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="term_condition_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cardify term_modules">
                        <div class="term">
                            <div class="term__title headpolicy">
                                <h4>Benefits of selling on Kanpurize:</h4>
                            </div>
                            <p class="headpolicy1">Kanpurize is a platform that is being prepared after 3 year of in-depth market research to find out actual pain areas of the Buyers and Sellers in the market of Kanpur and their best possible solutions. With its continuously growing user base Kanpurize helps the sellers in Kanpur to sell their products or services directly to the end customers. It helps to connect the sellers with the buyers in their locality, who are shopping online and buying the same product or service but from someone else located at out of the city. As a seller it lets you manage your shop from anywhere at any hour at the day. You can sell your products 24*7*365 without worrying about inventory management and help you reduce your dependency on manpower. </p>
                        </div>

                        <div class="term">
                            <div class="term__title headpolicy">
                                <h4>Get Registered on Kanpurize</h4>
                            </div>
                            <p class="headpolicy1">To sell your products/Services on Kanpurize you just need to register your business on Kanpurize.com. And its very easy.</p>
                            <p class="sellerpage"><span class="lnr lnr-file-add"></span> Documents required to register:</p>
                            <div class="row margin_div">
                            	<div class="orderrow">
                                	<div class="col-sm-4">
                                    	<div class="author-info author-info--dashboard mcolorbgx">
                            <p>Copy of GST Certificate</p>
                            <h3><img src="{{ asset('images/icon/2.png') }}" alt="online shop in kanpur" /></h3>
                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                    	<div class="author-info author-info--dashboard mcolorbgy">
                            <p>Copy of Pan card</p>
                           <h3><img src="{{ asset('images/icon/4.png') }}" alt="seller policy in kanpur" /></h3>
                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                    	<div class="author-info author-info--dashboard mcolorbgz">
                            <p>Copy of Aadhar Card</p>
                            <h3><img src="{{ asset('images/icon/3.png') }}" alt="online market in kanpur" /></h3>
                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row margin_div">
                            	<div class="orderrow">
                                	<div class="col-sm-4">
                                    	<div class="author-info author-info--dashboard mcolorbgx">
                            <p> Photograph of the owner</p>
                            <h3><img src="{{ asset('images/icon/5.png') }}" alt="social web in kanpur" /></h3>
                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                    	<div class="author-info author-info--dashboard mcolorbgy">
                            <p>Email of the business owner</p>
                           <h3><img src="{{ asset('images/icon/6.png') }}" alt="online business in kanpur" /></h3>
                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                    	<div class="author-info author-info--dashboard mcolorbgz">
                            <p>Contact no. of the business owner</p>
                            <h3><img src="{{ asset('images/icon/7.png') }}" alt="seller policy in kanpur" /></h3>
                        </div>
                                    </div>
                                </div>
                            </div>
                    
                    		<p class="sellerpage"><span class="lnr lnr-file-add"></span> Steps to Register:</p>
                            
                            <div class="registerseller">
                        <div class="regfeature">
                            <ul>
                                <li>
                                    Visit<a class="hyper" href="https://kanpurize.com" title="online platform in kanpur"><strong> www.kanpurize.com</strong></a> and login with you general login credentials. 
                                </li>
                                <li>
                                  Click on sell on Kanpurize
                                </li>
                                 <li>
                                  Fill the details, upload the documents 
                                </li>
                                 <li>
                                 Click submit 
                                </li>
                                <li>
                                 Pay for your web-shop
                                 </li>
                            </ul>
                            <p class="headpolicy1">Once your submission & payment is successful, our team will reach your doorstep within next 24 hours and verify all the details. Once all the details are verified you will be given your seller login portal and login credentials.<br /><br />Now just login with your credentials and list your products and their description!!! Once you are satisfied with the details of your web-shop, just let us know. We will make your web-shop live and You are ready to serve customers in all Kanpur.</p>
                        </div>
                    </div>
                    		<p class="sellerpage"><span class="lnr lnr-file-add"></span> Selling policy:</p>
                            
                            <div class="registerseller">
                        <div class="regfeature">
                            <p class="headpolicy1"><span>1.&nbsp;</span>Kanpurize as a platform does not give permission to sell the below mentioned products/services- <a href=" {{ url('kanpurize_Restricted') }} " target="_blank">List of restricted products/services to sell </a></p>
                             <p class="headpolicy1"><span>2.&nbsp;</span>The sellers must follow the community regulations and should not, knowingly or unknowingly, try to damage the reputation of any user/seller/shop or the portal.</p>
                              <p class="headpolicy1"><span>3.&nbsp;</span>The marketplace is created for Ethical Business activities hence any activity on part of any seller resulting in defaming the portal or any other seller or shop registered hereon, or any attempt to divert the customers or users to any other website or portal is strictly prohibited and doing so will lead to cancellation and suspension of the seller’s account and will not bound the portal to pay any amount to such seller on such cancellation or suspension.</p>
                               <p class="headpolicy1"><span>4.&nbsp;</span>Any fraudulent activity with the buyer or other seller or any type of price discrimination on the portal is strictly prohibited.</p>
                               <p class="headpolicy1"><span>5.&nbsp;</span>The portal belongs to whole Kanpur therefore any product or service listed here, creating any nuisance in the city or hurting the feeling of any person or group of persons is strictly prohibited and hence will result in taking required legal action or actions against the seller, followed by suspension/cancellation of the seller’s account with immediate effect and the company will not be liable to repay the seller against such cancellation.</p>
                                <p class="headpolicy1"><span>6.&nbsp;</span>Kanpurize works as a platform for connecting the seller and buyers in the city and hence for the listing of the product, selling it and guaranty or warranty thereon, the seller will be solely responsible for that. Kanpurize will not be liable for any such activity or activities and hence, cannot be made a party in any dispute between buyer and seller.</p>
                                   <p class="headpolicy1"><span>7.&nbsp;</span>Taking care of the privacy policies of the portal, the seller will not, until doing so is extremely important, share or disclose any information relating to any of its buyers with any third party, keeping Kanpurize aware of the same.</p>
                                   <p class="headpolicy1"><span>8.&nbsp;</span>Uploading any offer for any specific product or occasion requires full disclosure to maintain the transparency and prevent any fraud with the customers.</p>
                        </div>
                    </div>
                    <p class="sellerpage"><span class="lnr lnr-file-add"></span> Unauthorized products:</p>
                            
                            <div class="registerseller">
                        <div class="regfeature">
                                   <p class="headpolicy1">The sale of illegal, unsafe, or other restricted products listed on these pages, including products available only by prescription, is strictly prohibited. The list of products not for sale includes:</p>
                                   <div class="" style="padding-left:25px;">
                                   <h3 class="guidefor">Guide for listing of the products:</h3>
                                   <ul class="sellerneeds">
                                <li>The seller can list any product, except the restricted products, on his/her web-shops.</li>
                                 <li>The seller needs to give a title and upload the clearest possible image of his/her products.</li>
                                  <li>The seller needs to give the detailed description about the product including the status of the product (new/old/first handed, second handed etc.)</li>
                                   <li>The seller need to mention the price of every product listed on his/her web-shop only in INR.</li>
                                    <li>On receiving any order the seller need to update the status of the order after every step.</li>
                            </ul>
                            </div>
                        </div>
                    </div>

                         
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
   
  
 @stop