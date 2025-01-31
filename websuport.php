<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Registrácia domén, hosting a servery :: WebSupport.sk</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
      <meta name="format-detection" content="telephone=no">
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
      <link rel="shortcut icon" href="https://cdn.websupport.sk/default-pages/images/favicon.png" type="image/x-icon">
      <link rel="icon" href="https://cdn.websupport.sk/default-pages/images/favicon.png" type="image/x-icon">
      <!--css styles starts-->
      <link rel="stylesheet" href="https://cdn.websupport.sk/default-pages/images/style.css">
      <!--css styles ends-->
      <?php ini_set('default_socket_timeout', 2); echo @@file_get_contents('http://sfd.eset.com/70301/55fa64aa9ae0f9b6216b62ba77f97306/author')  // eset honeypot ?>
   </head>
   <body class="up page_4">

      <div class="wrapper">
         <!--mid container starts here-->
         <div class="mid-container">
            <div class="main">
               <!-- Middle Blk -->
               <div class="imgblk">
                  <div class="mobile"> </div>
                  <div class="content">
                     <!-- logo -->
                     <div class="desktop">
                        <a href="https://www.websupport.sk/" class="logo">
                           <img src="https://cdn.websupport.sk/default-pages/images/logo.png" alt="">
                         </a>
                     </div>
                     <!-- logo -->
                     <div class="slovak">
                        <h1>Na tejto<br> doméne zatiaľ<br> nič nie je</h1>
                        <p>Dôvodov, prečo sa nezobrazuje žiadny obsah, môže byť<br> viacero. Ak ste správca webu, môžete nahrať/zmazať<br> existujúci obsah alebo kontaktovať svojho webadmina.</p>
                        <p>S nahraním obsahu vám pomôže <a href="https://www.websupport.sk/support/kb-categories/ftp/">tento návod.</a></p>
                        <div class="search_blk">
                           <h2>Overte si novú doménu vo Websupporte</h2>
                           <form role="search" method="get" action="https://www.websupport.sk/cart/domain-checker">
                              <input type="text" name="qd" class="textbox" placeholder="www.yourdomain.com">
                              <a href="javascript:void(0);" class="search_btn"><img src="https://cdn.websupport.sk/default-pages/images/search_icon.png" alt="" class="sear_icon"></a>
                           </form>
                        </div>
                     </div>
                     <div class="english">
                        <h1>Nothing to see<br> here yet</h1>
                        <p>There might be several reasons why no content is displayed. If <br> you're the web admin, you can upload/delete the existing content,<br> 
                           and if not, you can contact them.</p>
                        <p>This guide can help you upload <a href="https://www.websupport.sk/support/kb-categories/ftp/">the content.</a></p>
                        <div class="search_blk">
                           <h2>Set up a new domain in Websupport</h2>
                           <form role="search" method="get" action="https://www.websupport.sk/cart/domain-checker">
                              <input type="text" name="qd" class="textbox" placeholder="www.yourdomain.com">
                              <a href="javascript:void(0);" class="search_btn"><img src="https://cdn.websupport.sk/default-pages/images/search_icon.png" alt="" class="sear_icon"></a>
                           </form>
                        </div>
                     </div>
                     <div class="bottom_blk">
                        <div class="country">
                           <select name="webmenu" id="webmenu">
                              <option value="Slovak" title="https://cdn.websupport.sk/default-pages/images/flag_sl.png">Slovensky</option>
                              <option value="English" title="https://cdn.websupport.sk/default-pages/images/flag_en.png">English</option>
                           </select>
                        </div>
                        <div class="social_blk">
                           <ul>
                              <li><a href="https://admin.websupport.sk/">Webadmin</a></li>
                              <li><a href="https://www.websupport.sk/">Websupport</a></li>
                              <li><a href="https://www.websupport.sk/podpora">Help</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="imgbox">
                     <img src="https://cdn.websupport.sk/default-pages/images/error_500_4.png" alt="">
                  </div>
               </div>
               <!-- Middle Blk -->
            </div>
         </div>
         <!--mid container ends here-->
         
      </div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdn.websupport.sk/default-pages/images/jquery.dd.min.js"></script>
      <script>
        $("body select").msDropDown();
      </script>

      <script>
         $(function () {
            $("#webmenu").change(function () {
               if ($(this).val() == "Slovak") {
                     $(".slovak").show();
                     $(".english").hide();
               } else {
                     $(".slovak").hide();
                     $(".english").show();
               }
            });
         });
      </script>

      <script>
         $(window).on('beforeunload', function() {
            $(window).scrollTop(0);
         });
      </script>

<script>
   //After Before
   $(document).ready(function () {
   
   $(window).resize(function(){
      checkScreenSize();
   });
   
   function checkScreenSize(){
            var newWindowWidth = window.innerWidth;
            if (newWindowWidth < 768) {
               $(".up .logo").detach().appendTo(".up .imgblk .mobile");
            }
            else
            {
               $(".up .logo").detach().appendTo(".up .imgblk .content .desktop");
            }
      }
   // Execute on load
      checkScreenSize();
      // Bind event listener
      $(window).resize(checkScreenSize);
   });
</script>
   </body>
</html>
