<template>
      <!-- Navbar start -->
      <nav class="navbar navbar-dark z position-fixed bg-dark w-100">
  <div class="container-fluid">
    <a class="navbar-brand" @click="search()" href="#"><iconify-icon class="me-2" inline icon="tabler:brand-backbone"></iconify-icon><span class="text-uppercase">Kein-Movies</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><iconify-icon class="me-2" inline icon="tabler:brand-backbone"></iconify-icon><span class="text-uppercase">Kein-Movies</span></h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" @click="search()">All</a>
          </li>
        </ul>
        <div class="d-flex mt-3" role="search">
          <input class="form-control me-2" v-on:keyup.enter="search()" type="search" v-model="searchKey" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit" @click="search()">Search</button>
        </div>
      </div>
    </div>
  </div>
    </nav>
    <!-- Navbar end -->

    <div class="container-fluid custom_bg" style="height:auto">      
      <div class="row">
        <div class="content-container col-10 offset-1">
          <div class="row mt-3">
            <div class="col-lg-3 col-md-4 col-sm-5 p-1 mb-2 overlay-container"  v-for="(item,index) in movie_list" :key="index">
              <img :src="item.image" class="rounded movie-item" alt=""  style="height:250px">
              <div @click="movieDetails(item.id)" class="overlay ms-5 d-flex align-items-center justify-content-center" style="width:174px">
                <span class="text-uppercase text-wrap fw-bold text-white p-2">{{item.title}}</span>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <footer class="footer">
      
    </footer>
</template>

<script src="../js/HomeView.js">
</script>

<style>
.navbar{
  z-index: 9999;
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
}

.overlay-container{
  cursor:pointer;

  position: relative;
  width: 50%;
}

.overlay-container:hover .overlay {
  opacity: 1;
}

.movie-item{
  transition: .45s;
  /* filter: brightness(80%); */
}

.overlay-container:hover .movie-item{
  filter: brightness(25%);
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}
.custom_carousel_indicators{
  background: rgba(250, 250, 250, 0.26);
backdrop-filter: blur( 4px );
-webkit-backdrop-filter: blur( 4px );
border-radius: 10px;
border: 1px rgba( 255, 255, 255, 0.18 );
}
.custom_bg{
  background: black;
  height: 200vh;
  padding-top: 8%;
}
.custom-img-container{
  position: relative;
  text-align: center;
  color: white;
}
.img-text-top-left{
  position: absolute;
  top: 18%;
  left: 50%;
  transform: translate(-50%,-50%);
}
</style>