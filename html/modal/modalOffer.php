<!-- offer Modal -->
<div class="modal fade" id="offerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header omColor" id="omHeader">
                <h3 class="modal-title whiteText" id="exampleModalLabel">Angebot</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body omColor" id="omBody">
                <div id="omContent">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-auto">
                                    <div>
                                        <h4 class="whiteText">Ein Joghurt</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div id="omTagDiv">
                                    <svg width="150px" height="55px">
                                        <polygon points="10,30 30,10 140,10 140,50 30,50" id="offerTagPolygon" />
                                        <text x="40" y="36" fill="white">Essen</text>
                                    </svg>
                                </div>
                            </div>
                            <div class="row">
                                <div class="=col-auto">
                                    <div id="omLocationTagDiv">
                                        <i class="fas fa-map-marker-alt locationTag" id="omLocationTag"></i>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div id="omCityDiv">
                                        <span class="whiteText">Mosbach</span>
                                        <br>
                                        <span class="whiteText">15 km</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <img src="images/yoghurt.jpg" class="img-fluid" id="omImage">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div id="omDescriptionDiv">
                                <hr id="divider">
                                <p class="whiteText">MDH: 01.01.2020</p>
                                <p class="whiteText">Habe einen Naturjoghurt übrig. Will den jemand?</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark float-right">Interesse</button>
                            <button type="button" class="btn btn-light float-right whiteText"
                                id="omReportOffer">Melden</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal -->