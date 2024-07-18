<!DOCTYPE html>
<html lang="en">
   <head>
      
      @include('beranda.css')

   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <header>
         @include('beranda.header')
      </header>
      <!-- banner -->
      @include('beranda.slider')
      <!-- end banner -->
      <!-- about -->
      {{-- @include('beranda.about') --}}
      <!-- end about -->
      <!-- our_room -->
      @include('beranda.blog')
      <!-- end our_room -->
      <!-- gallery -->
      <!-- end gallery -->
      @include('beranda.galeri')
      <!-- blog -->
      @include('beranda.hotel')
      <!-- end blog -->
      <!--  contact -->
      {{-- @include('beranda.contact-us') --}}
      <!-- end contact -->
      <!--  footer -->
      @include('beranda.footer')
   </body>
</html>