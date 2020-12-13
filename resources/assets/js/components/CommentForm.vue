<template>
    <div class="col-lg-6">
        <div class="review_box">
            <h4 class="col-md-12 d-flex justify-content-center">Donnez votre avis !</h4>
            <form @submit.prevent="postComment">

                <div class="col-md-12">
                    <div class="form-group">
                        <div class="mt-1 mb-2 d-flex justify-content-center col">
                            <h5>Allez-y, notez le produit !</h5>
                            
                            <star-rating v-model="formData.rating"></star-rating>
                        </div>
                        <div class="mt-2">
                            <h5>Votre avis</h5>
                            <textarea class="form-control" v-model="formData.message" id="message" rows="1" placeholder="Message"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-right">
                    <button type="submit" value="submit" class="btn primary-btn">Valider</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    props: ['product'],
    data(){
        return {
            formData: {}
        }
    },
    methods: {
        postComment(){
            this.formData.product_id = product.id;
            axios.post(this.url, this.formData)
            .then(data=>{
                location.reload();
            })
            .catch(error=>{
                console.log(error);
            })
        }
    }
}
</script>


<style>

</style>