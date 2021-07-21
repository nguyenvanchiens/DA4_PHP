@extends('fontend.layout.master')
@section('main')
<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">    	

            <div class="col-sm-12">    
                <h2 class="title text-center">Liên hệ  <strong>chúng tôi</strong></h2>		   			
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6406.257549034577!2d105.99561820300484!3d20.889751439680253!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135bac5f5cf99c7%3A0x106a430fc607aba3!2zVmnhu4d0IEPGsOG7nW5nLCBZw6puIE3hu7ksIEjGsG5nIFnDqm4sIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1621043688090!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>    			    				    				             
            </div>			 		
        </div>    
        <div style="margin-bottom: 50px"></div>	
        <div class="row">  	
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Liên lạc</h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                        </div>                        
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Thông tin liên lạc</h2>
                    <address>
                        <p>E-Shopper Inc.</p>
                        <p>Mỹ xá việt cường yên mỹ hưng yên</p>
                        <p>Hưng yên</p>
                        <p>Mobile:0965842998</p>
                        <p>Email: chienymhy@gmail.com</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Social Networking</h2>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/profile.php?id=100004895267775"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-twitch"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-google"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>    			
        </div>  
    </div>	
</div>
@endsection