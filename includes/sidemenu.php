<div class="sidebar sb-left">
         <nav class="mobile-nav">
            <form role="form" autocomplete="off" lpformnum="1">
               <i class="icon-magnifying-glass"></i>
               <input type="text" class="search-mobile search-input" value="" placeholder="Search...">
            </form>
            <ul>
               <li url-base='home'    ><a href="/"><i class="icon-home" ></i><span>Home</span></a></li>
               <li url-base='movies'  ><a href="/movies"><i class="icon-video"></i><span>Movies</span></a></li>
               <li  url-base='tv-series' ><a href="/tv-shows"><i class="icon-tv"></i><span>TV Series</span></a></li>
               <li  url-base='new-episodes' ><a href="/new-episodes"><i class="icon-tv"></i><span>New Episodes</span></a></li>
               <li  url-base='most-watched'  ><a href="/most-watched"><i class="icon-star"></i><span>Most Watched</span></a></li>
               <!--<li  class=" contact-mobile"   ><a href="/contact"><i class="icon-mail"></i><span>Contact</span></a></li>
               <li  class=" signout-mobile"   ><a href="/session/logout"><i class="fa fa-sign-out"></i><span>Sign out</span></a></li>
               <li  class="signout-mobile"><a href="/users"><i class="fa fa-user"></i><span>Setting</span></a></li>-->
            </ul>
         </nav>
      </div>

      <style>
         @media (min-width: 769px) {
         .auto-complete-container-mobile {
         display:none!important;
         }
         }
         @media (max-width: 768px) {
         .auto-complete-container-mobile {
         display:block!important;
         }
         }
         .mobile-nav form {
         display: none;
         }
         .auto-complete-container-mobile ul {
         max-width: 900px!important;
         }
         .auto-complete-container-mobile span {
         color: rgba(255, 255, 255, 0.56);
         margin-top: 5px;
         }
         .auto-complete-container-mobile {
         overflow: auto;
         color: #fff!important;
         width: 100%!important;
         margin-top: 0px!important;
         box-shadow: 0px 1px 2px 2px rgba(0,0,0, 0.4);
         }
         .auto-complete-container-mobile p {
         color: #fff!important;
         }
         .search-mobile {
         padding: 16px 35px;
         width: 100%;
         background-color: #1d1d1d;
         color: #fff;
         /* border-color: #1d1d1d; */
         border: 1px solid #1d1d1d;
         border-radius:0px!important;
         }
         nav.mobile-nav .icon-magnifying-glass {
         position: absolute;
         margin-top: 22px;
         margin-left: 10px;
         }
      </style>