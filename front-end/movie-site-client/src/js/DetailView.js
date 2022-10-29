import axios from "axios";

export default {
    name: 'DetailView',
    data() {
        return {
            movie_id: 0,
            movie_data: {}
        }
    },
    methods: {
        getDetail() {
            let movie_id = {
                id: this.movie_id
            }
            axios.post('http://localhost:8000/api/movies/detail', movie_id)
                .then((response) => {
                    response.data.movie.image = 'http://localhost:8000/movie_posters/' + response.data.movie.image;
                    this.movie_data = response.data.movie;
                })
        },
        goHome() {
            this.$router.push({
                name: 'home'
            })
        }
    },
    mounted() {
        this.movie_id = this.$route.params.movie_id;
        this.getDetail();
    }
}