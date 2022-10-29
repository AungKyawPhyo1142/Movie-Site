import axios from 'axios'

export default {
    name: 'HomeView',
    data() {
        return {
            'poster_list': [],
            'movies_id': [],
            'movie_list': [],
            'searchKey': '',
        }
    },
    components: {
        // Icon
    },
    methods: {
        getAllMoviesPosters() {
            axios.get('http://localhost:8000/api/movies/all')
                .then((response) => {
                    for (let i = 0; i < response.data.movies.length; i++) {
                        response.data.movies[i].image = 'http://localhost:8000/movie_posters/' + response.data.movies[i].image;
                        this.poster_list[i] = response.data.movies[i].image;
                        this.movies_id[i] = response.data.movies[i].id;
                    }
                    this.movie_list = response.data.movies;
                })
                .catch((e) => {
                    console.log(e);
                })

        },
        search() {
            let search = {
                key: this.searchKey
            };
            axios.post('http://localhost:8000/api/movies/search', search)
                .then((response) => {
                    for (let i = 0; i < response.data.result.length; i++) {
                        response.data.result[i].image = 'http://localhost:8000/movie_posters/' + response.data.result[i].image;
                    }
                    this.movie_list = response.data.result;
                    this.searchKey = '';
                })
        }
    },
    mounted() {
        this.getAllMoviesPosters();
    }
}