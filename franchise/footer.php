<footer class="footer-bg footer-p"> 
    <div class="footer-top pt-120 pb-80 p-relative" style="background-image: url(img/bg/footer-bg.png); background-color: #fff; background-repeat: no-repeat; background-size: cover; background-position: center;"> 
        <div class="container"> 
            <div class="row justify-content-between"> 

                <div class="col-xl-3 col-lg-3 col-sm-6"> 
                    <div class="footer-widget mb-30"> 
                        <div class="f-widget-title mb-15"> 
                            <a href="../index.php"><img src="../img/logo.png" alt="logo"></a>
                        </div> 
                        <div class="footer-text mb-20"> 
                            <p>Abacus learning introduces children to mathematics through a visual and hands-on approach. With regular practice.</p> 
                        </div> 
                        <div class="footer-social"> 
                           <a href="#" class="social-facebook"></a> 
                           <a href="#" class="social-instagram"></a> 
                           <a href="#" class="social-youtube"></a> 
                        </div> 
                    </div> 
                </div> 

                <div class="col-xl-2 col-lg-2 col-sm-6"> 
                    <div class="footer-widget mb-30"> 
                        <div class="f-widget-title"> 
                            <h2>Our Links</h2> 
                        </div> 
                        <div class="footer-link"> 
                            <ul> 
                                <li><a href="../index.php">Home</a></li> 
                                <li><a href="../about.php">About Us</a></li> 
                                <li><a href="../courses.php">Courses</a></li> 
								<li><a href="../gallery.php">Gallery</a></li> 
                                <li><a href="../contact.php">Contact Us</a></li> 
								<li><a href="#">Games</a></li> 
                            </ul> 
                        </div> 
                    </div> 
                </div> 

                <div class="col-xl-3 col-lg-3 col-sm-6"> 
                    <div class="footer-widget mb-30"> 
                        <div class="f-widget-title"> 
                            <h2>Contact Us</h2> 
                        </div> 
                        <div class="f-contact"> 
                            <ul> 
                                <li> 
                                    <span>
                                        <?=getContact($conn,'office')?><br>
                                        <?=getContact($conn,'addline1')?><br>
                                        <?=getContact($conn,'addline2')?>
                                    </span> 
                                </li> 

                                <li> 
                                    <span>
                                        <?=getContact($conn,'phone1')?>
                                        <?php if(getContact($conn,'phone2')) { ?>
                                        <br><?=getContact($conn,'phone2')?>
                                        <?php } ?>
                                    </span> 
                                </li> 

                                <li> 
                                    <span> 
                                        <a href="mailto:<?=getContact($conn,'email1')?>">
                                            <?=getContact($conn,'email1')?>
                                        </a> 
                                        <?php if(getContact($conn,'email2')) { ?>
                                        <br>
                                        <a href="mailto:<?=getContact($conn,'email2')?>">
                                            <?=getContact($conn,'email2')?>
                                        </a> 
                                        <?php } ?>
                                    </span> 
                                </li> 
                            </ul> 
                        </div> 
                    </div> 
                </div> 

               

            </div> 
        </div> 
    </div> 

    <div class="copyright-wrap text-center"> 
        <div class="container"> 
            <div class="row align-items-center"> 
                <div class="col-lg-12"> 
                    Copyright &copy; <?=date('Y')?> ITDB Abacus All rights reserved. 
                </div> 
            </div> 
        </div> 
    </div> 
</footer>

