<!-- offer Modal -->
<div class="modal fade" id="offerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header omColor" id="omHeader">
                <h3 class="modal-title whiteText" id="exampleModalLabel"></h3>
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
                                        <h4 id="offerModalTitle" class="whiteText"></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div id="omTagDiv">
                                    <svg width="150px" height="55px">
                                        <polygon points="10,30 30,10 140,10 140,50 30,50" id="offerTagPolygon" />
                                        <text id="offerModalTagText" x="40" y="36" fill="white"></text>
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
                                        <span id="offerModalLocationName" class="whiteText"></span>
                                        <br>
                                        <span id="offerModalLocationDistance" class="whiteText"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="modalOfferImageContainer" class="col-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div id="omDescriptionDiv">
                                <hr id="divider">
                                <p id="offerModalMHDText" class="whiteText"></p>
                                <p id="offerModalOfferDescription" class="whiteText"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="offerModalActionButtons" class="col-12">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal -->