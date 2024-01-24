@extends($activeTheme . 'layouts.app')

@section('content')
    <div class="faq py-120">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1500">
                <div class="col-lg-6">
                    <div class="section-heading text-center">
                        <h2 class="section-heading__title mx-auto">Frequently Asked Question</h2>
                        <p class="section-heading__desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate doloribus recusandae iste fugit assumenda.</p>
                    </div>
                </div>
            </div>
            <div class="accordion custom--accordion" id="accordionExample">
                <div class="row g-4 align-items-center justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What is crowdfunding?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Crowdfunding is a method of raising funds from a large number of people, typically via online platforms. It allows individuals, businesses, or organizations to present their projects, causes, or ventures to a wide audience, inviting contributions from interested
                                        individuals, known as backers or supporters.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How does crowdfunding work?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Crowdfunding involves creating a campaign that outlines the details of a project or cause, including its purpose, goals, and often, rewards for backers. Supporters can then contribute financially to the campaign through the crowdfunding platform. If the funding
                                        goal is reached within a specified timeframe, the project is funded, and funds are typically released to the campaign creator.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    What types of crowdfunding are there?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>There are various types of crowdfunding, including reward-based (backers receive non-financial incentives), equity-based (backers receive a share of the project), donation-based (contributors give without expecting anything in return), and debt-based (backers lend
                                        money to the project, expecting repayment with interest).</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    What are the benefits of crowdfunding?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Crowdfunding offers a democratized approach to funding, allowing creators to access capital from a broad audience. It also provides a platform for testing market interest, building a community around a project, and gaining early support and validation.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Is crowdfunding only for business startups?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>No, crowdfunding is versatile and can be used for various purposes, including supporting creative projects, charitable causes, personal needs, or even product launches. It's not limited to business startups and has been successfully used across diverse sectors.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Are there risks involved in crowdfunding?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Yes, there are risks associated with crowdfunding. Contributors may not receive the promised rewards or returns, and projects may not be completed as planned. Due diligence is crucial for both creators and backers to minimize these risks.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    How do creators set crowdfunding goals?
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Creators should carefully calculate their funding needs, considering the costs associated with their project or cause. It's essential to set a realistic goal that covers expenses while appealing to potential backers. Unrealistic goals can lead to unsuccessful
                                        campaigns.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-duration="1500">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    What tips can enhance a crowdfunding campaign's success?
                                </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Success often hinges on effective communication, a compelling story, and a well-thought-out marketing strategy. Engaging with the audience, offering attractive rewards, and providing regular updates can build trust and momentum for a crowdfunding campaign.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
