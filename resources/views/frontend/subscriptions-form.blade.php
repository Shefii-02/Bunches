<section class="subscribe py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 py-5">
                <h1 class="fw-bold text-center text-white">Our Satisfaction Guarantee</h1>
                <p class="text-center text-white fw-500 f-26 text-uppercase">Not 100% satisfied? Send it back! Within 30
                    days</p>
                    <form action="#" method="POST" id="_form_subscription_" class="validated not-ajax">
                        @csrf
                        <div class="d-flex mt-5 justify-content-center">
                            <input type="email" autocomplete="off" name="email" required class="form-control rounded-0 w-75" placeholder="Email Address">
                            <button type="submit" class="btn rounded-0 subscribe-btn _form__submit"><i class="bi bi-send-fill f-20"></i></button>
                        </div>
                        <p class="text-center text-white mt-4 fw-500 mb-0 f-26">Discounts, sales, news, and more - Subcribe to
                            our newsletter</p>
                    </form>
            </div>
        </div>
    </div>
</section>