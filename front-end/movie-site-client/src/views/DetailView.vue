<template>
          <!-- Navbar start -->
          <nav class="navbar navbar-dark z position-fixed bg-dark w-100">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><iconify-icon class="me-2" inline icon="tabler:brand-backbone"></iconify-icon><span class="text-uppercase">Kein-Movies</span></a>
    <a href="" @click="goHome()" class="btn btn-dark text-white text-uppercase">Home</a>

    </div>
    </nav>
    <!-- Navbar end -->
    <div>
        <div class="container-fluid" style="height:100vh">
            <div class="row" style="height:100vh">
                <div class="col-5">
                    <img :src="movie_data.image" alt="" class="rounded" style="height:500px; margin-top: 5rem;">
                </div>
                <div class="col d-flex flex-column" style="height:fit-content">
                    <div class="content-container" style="margin-top:5rem">
                        <div class="title-container text-start">
                            <h1 class="fw-bolder text-white text-uppercase">{{movie_data.title}}</h1>
                            <div class="">
                                <span class="custom_font-sm btn btn-outline-light"><i class="fa-solid fa-star me-1"></i>{{movie_data.rating}}</span>
                                <span class="custom_font-sm btn btn-outline-light mx-2 text-uppercase">{{movie_data.rated}}</span>
                            </div>
                        </div>
                        <div class="genre-container mt-2 text-start text-white">
                            <span class="custom_font-md">Genre: <span>{{movie_data.genre}}</span></span>
                        </div>
                    </div>
                    <div class="description-container mt-3">
                        <p class="text-white text-start custom_font-lg">
                            {{movie_data.description}}
                        </p>
                    </div>
                    <div class="link-container mt-3">
                        <div class=" text-start text-white fs-5">
                            <span class="custom_font-lg">Download Links:</span>
                            <div class="">
                                <ul>
                                    <li>
                                        <a :href="movie_data.gdrive_link" target="_blink" class="text-white">Google Drive</a>
                                    </li>
                                    <li>
                                        <a :href="movie_data.mdrive_link" target="_blink" class="text-white">Mega Drive</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script src="../js/DetailView.js">
</script>

<style>
.custom_font-sm{
    font-size:.65rem;
}
.custom_font-md{
    font-size: 1rem;
}
.custom_font-lg{
    font-size: 1.5rem;
}
</style>
