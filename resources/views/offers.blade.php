@include('header')

<section class="mt-28">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="breadcrumbs">
				    <a class="_2iET cW_J" href="{{ url('/') }}/my-offers">My offers</a>
				    <span>Create a new offer</span>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
		    <div class="col-sm-12 col-md-12">
		        <form id="msform" method="post" action="createoffer">
                 {{ csrf_field() }}
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li id="s1" class="active">Step</li>
                        <li id="s2">Step</li>
                        <li id="s3">Step</li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset id="menu1">
                        <div class="form-group row text-left">
                            <label class="col-sm-3 col-form-label" style="padding-top:0">Offer Type * :</label>
                            <div class="col-sm-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="type" value="14" type="radio"  id="buy">
                                    <label class="form-check-label" for="buy">Buy Offer</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="type" value="15" type="radio"  id="sell">
                                    <label class="form-check-label" for="sell">Sell Offer</label>
                                </div>
                                <!-- <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="bch">
                                    <label class="form-check-label" for="bch">BCH</label>
                                </div> -->
                            </div>
                        </div>
                        <div class="form-group row text-left">
                            <label class="col-sm-3 col-form-label" style="padding-top:0">Location * :</label>
                            <div class="col-sm-9">
                                <input type="search" id="address" autocomplete="new-location2" name="location2" class="form-control" placeholder="Choose City" />
                            </div>
                        </div>
                        <div class="form-group row text-left">
                            <label class="col-sm-3 col-form-label" style="padding-top:0">Payment Method * :</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    @if($country=="IN")
                                    <div class="col-sm-12">
                                        <p>Trade with someone in India:</p>
                                        <div class="row">
                                        @foreach($payment_methods as $pm)
                                            @if($pm->local=="1")
                                            <div class="col-sm-4">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="payment_method" value="{{ $pm->id }}" type="radio">
                                                    <label class="form-check-label">{{ $pm->name }}</label>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                        </div>
                                    </div>
                                    @endif 
                                    <div class="col-sm-12" style="margin-top:10px;">
                                        <p>Trade with anyone in the world:</p>
                                        <div class="row">
                                        @foreach($payment_methods as $pm)
                                            @if($pm->local!="1")
                                                <div class="col-sm-4">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="payment_method" value="{{ $pm->id }}" type="radio">
                                                        <label class="form-check-label">{{ $pm->name }}</label>
                                                    </div>
                                                </div>
                                                @endif
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row text-left">
                            <label class="col-sm-3 col-form-label" style="padding-top:0">Trade With Currency * :</label>
                            <div class="col-sm-9">
                                <select name="trade_cur2" class="form-control">
                                    <option value="">Choose currency</option>
                                    @foreach($all_currency as $ac)
                                        <option value="{{ $ac['currencies'][0]['code'] }}">{{ $ac['currencies'][0]['code'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="button" name="next" class="action-button" id="next1" value="Next">    
                    </fieldset>
                    <fieldset id="menu2">
                        <div class="form-group row text-left">
                            <label class="col-sm-3 col-form-label" style="padding-top:0">Select Coin * :</label>
                            <div class="col-sm-3">
                                <select name="coins" class="form-control">
                                    <option>Select Coin</option>
                                    @foreach($coins as $coin)
                                        @if($coin->id == '1' || $coin->id == '2' || $coin->id == '3')
                                        <option value="{{ $coin->id }}">{{ $coin->label }}</option>
                                        @endif
                                    @endforeach
                                </select>                           
                            </div>
                        </div>
                        <div class="form-group row text-left">
                            <lable fro="price" class="col-sm-3 col-form-label">Price * :</lable>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-4">
                                            <input type="text" autocomplete="new-per" name="per" class="form-control" placeholder="e.g. '1.5' %" id="per">
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="ab_bl" value="1" type="radio" >
                                            <label class="form-check-label" >Above</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="ab_bl" value="12" type="radio" >
                                            <label class="form-check-label" >Below</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="button" id="confprice" class="btn btn-info btn-grey">Confirm Price *</button>
                                    </div>
                                    <div class="col-sm-12" id="confdata" style="margin-top:10px;">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row text-left">
                            <lable fro="price" class="col-sm-3 col-form-label">Min Range* :</lable>
                            <div class="col-sm-9">
                                <input class="form-control" autocomplete="new-minrange" name="min_range" type="text">
                            </div>
                        </div>
                        <div class="form-group row text-left">
                            <lable fro="price" class="col-sm-3 col-form-label">Max Range* :</lable>
                            <div class="col-sm-9">
                                <input class="form-control" autocomplete="new-maxrange" name="max_range" type="text">
								<span id="err_maxRange"> </span>
                            </div>
                        </div>
                        <input type="button" name="previous" class="action-button-previous" id="prev1" value="Previous"/>
                        <input type="button" name="next" class="action-button" id="next2" disabled value="Next"/>
                    </fieldset>
                    <fieldset id="menu3">
                        
                        <div class="form-group row text-left">
                            <lable fro="price" class="col-sm-3 col-form-label">Headline :</lable>
                            <div class="col-sm-9">
                                <input class="form-control" autocomplete="new-headline" name="headline" type="text">
                            </div>
                        </div>
                        <div class="form-group row text-left">
                            <lable fro="price" class="col-sm-3 col-form-label">Terms of the Trade :</lable>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="15" name="terms" type="text"></textarea>
                            </div>
                        </div>
                        <div class="form-group row text-left">
                            <label class="col-sm-3 col-form-label" style="padding-top:0">Time Zone :</label>
                            <div class="col-sm-9">
                                <select name="timezone" class="form-control">
                                    <option value="{{ $timezones }}">{{ $timezones }}</option>
                                    @foreach($all_currency as $ac)
                                        <option value="{{ $ac['timezones'][0]}}">{{ $ac['timezones'][0]}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row text-left">
                            <label class="col-sm-3 col-form-label" style="padding-top:0"></label>
                            <div class="col-sm-9">
                                <p>Select your standard hours :</p>
                                <div class="row" style="margin-top:10px;">
                                    <div class="col-sm-6">
                                        <select name="timezone2" class="form-control">
                                            <option value="">Wake (e.g. '9:00 AM')</option>
                                            <option value="12:00 am">12:00 am</option>
                                            <option value="12:15 am">12:15 am</option>
                                            <option value="12:30 am">12:30 am</option>
                                            <option value="12:45 am">12:45 am</option>
                                            <option value="1:00 am">1:00 am</option>
                                            <option value="1:15 am">1:15 am</option>
                                            <option value="1:30 am">1:30 am</option>
                                            <option value="1:45 am">1:45 am</option>
                                            <option value="2:00 am">2:00 am</option>
                                            <option value="2:15 am">2:15 am</option>
                                            <option value="2:30 am">2:30 am</option>
                                            <option value="2:45 am">2:45 am</option>
                                            <option value="3:00 am">3:00 am</option>
                                            <option value="3:15 am">3:15 am</option>
                                            <option value="3:30 am">3:30 am</option>
                                            <option value="3:45 am">3:45 am</option>
                                            <option value="4:00 am">4:00 am</option>
                                            <option value="4:15 am">4:15 am</option>
                                            <option value="4:30 am">4:30 am</option>
                                            <option value="4:45 am">4:45 am</option>
                                            <option value="5:00 am">5:00 am</option>
                                            <option value="5:15 am">5:15 am</option>
                                            <option value="5:30 am">5:30 am</option>
                                            <option value="5:45 am">5:45 am</option>
                                            <option value="6:00 am">6:00 am</option>
                                            <option value="6:15 am">6:15 am</option>
                                            <option value="6:30 am">6:30 am</option>
                                            <option value="6:45 am">6:45 am</option>
                                            <option value="7:00 am">7:00 am</option>
                                            <option value="7:15 am">7:15 am</option>
                                            <option value="7:30 am">7:30 am</option>
                                            <option value="7:45 am">7:45 am</option>
                                            <option value="8:00 am">8:00 am</option>
                                            <option value="8:15 am">8:15 am</option>
                                            <option value="8:30 am">8:30 am</option>
                                            <option value="8:45 am">8:45 am</option>
                                            <option value="9:00 am">9:00 am</option>
                                            <option value="9:15 am">9:15 am</option>
                                            <option value="9:30 am">9:30 am</option>
                                            <option value="9:45 am">9:45 am</option>
                                            <option value="10:00 am">10:00 am</option>
                                            <option value="10:15 am">10:15 am</option>
                                            <option value="10:30 am">10:30 am</option>
                                            <option value="10:45 am">10:45 am</option>
                                            <option value="11:00 am">11:00 am</option>
                                            <option value="11:15 am">11:15 am</option>
                                            <option value="11:30 am">11:30 am</option>
                                            <option value="11:45 am">11:45 am</option>
                                            <option value="12:00 pm">12:00 pm</option>
                                            <option value="12:15 pm">12:15 pm</option>
                                            <option value="12:30 pm">12:30 pm</option>
                                            <option value="12:45 pm">12:45 pm</option>
                                            <option value="1:00 pm">1:00 pm</option>
                                            <option value="1:15 pm">1:15 pm</option>
                                            <option value="1:30 pm">1:30 pm</option>
                                            <option value="1:45 pm">1:45 pm</option>
                                            <option value="2:00 pm">2:00 pm</option>
                                            <option value="2:15 pm">2:15 pm</option>
                                            <option value="2:30 pm">2:30 pm</option>
                                            <option value="2:45 pm">2:45 pm</option>
                                            <option value="3:00 pm">3:00 pm</option>
                                            <option value="3:15 pm">3:15 pm</option>
                                            <option value="3:30 pm">3:30 pm</option>
                                            <option value="3:45 pm">3:45 pm</option>
                                            <option value="4:00 pm">4:00 pm</option>
                                            <option value="4:15 pm">4:15 pm</option>
                                            <option value="4:30 pm">4:30 pm</option>
                                            <option value="4:45 pm">4:45 pm</option>
                                            <option value="5:00 pm">5:00 pm</option>
                                            <option value="5:15 pm">5:15 pm</option>
                                            <option value="5:30 pm">5:30 pm</option>
                                            <option value="5:45 pm">5:45 pm</option>
                                            <option value="6:00 pm">6:00 pm</option>
                                            <option value="6:15 pm">6:15 pm</option>
                                            <option value="6:30 pm">6:30 pm</option>
                                            <option value="6:45 pm">6:45 pm</option>
                                            <option value="7:00 pm">7:00 pm</option>
                                            <option value="7:15 pm">7:15 pm</option>
                                            <option value="7:30 pm">7:30 pm</option>
                                            <option value="7:45 pm">7:45 pm</option>
                                            <option value="8:00 pm">8:00 pm</option>
                                            <option value="8:15 pm">8:15 pm</option>
                                            <option value="8:30 pm">8:30 pm</option>
                                            <option value="8:45 pm">8:45 pm</option>
                                            <option value="9:00 pm">9:00 pm</option>
                                            <option value="9:15 pm">9:15 pm</option>
                                            <option value="9:30 pm">9:30 pm</option>
                                            <option value="9:45 pm">9:45 pm</option>
                                            <option value="10:00 pm">10:00 pm</option>
                                            <option value="10:15 pm">10:15 pm</option>
                                            <option value="10:30 pm">10:30 pm</option>
                                            <option value="10:45 pm">10:45 pm</option>
                                            <option value="11:00 pm">11:00 pm</option>
                                            <option value="11:15 pm">11:15 pm</option>
                                            <option value="11:30 pm">11:30 pm</option>
                                            <option value="11:45 pm">11:45 pm</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select name="timezone3" class="form-control">
                                            <option value="">Sleep (e.g. '9:00 AM')</option>
                                            <option value="12:00 am">12:00 am</option>
                                            <option value="12:15 am">12:15 am</option>
                                            <option value="12:30 am">12:30 am</option>
                                            <option value="12:45 am">12:45 am</option>
                                            <option value="1:00 am">1:00 am</option>
                                            <option value="1:15 am">1:15 am</option>
                                            <option value="1:30 am">1:30 am</option>
                                            <option value="1:45 am">1:45 am</option>
                                            <option value="2:00 am">2:00 am</option>
                                            <option value="2:15 am">2:15 am</option>
                                            <option value="2:30 am">2:30 am</option>
                                            <option value="2:45 am">2:45 am</option>
                                            <option value="3:00 am">3:00 am</option>
                                            <option value="3:15 am">3:15 am</option>
                                            <option value="3:30 am">3:30 am</option>
                                            <option value="3:45 am">3:45 am</option>
                                            <option value="4:00 am">4:00 am</option>
                                            <option value="4:15 am">4:15 am</option>
                                            <option value="4:30 am">4:30 am</option>
                                            <option value="4:45 am">4:45 am</option>
                                            <option value="5:00 am">5:00 am</option>
                                            <option value="5:15 am">5:15 am</option>
                                            <option value="5:30 am">5:30 am</option>
                                            <option value="5:45 am">5:45 am</option>
                                            <option value="6:00 am">6:00 am</option>
                                            <option value="6:15 am">6:15 am</option>
                                            <option value="6:30 am">6:30 am</option>
                                            <option value="6:45 am">6:45 am</option>
                                            <option value="7:00 am">7:00 am</option>
                                            <option value="7:15 am">7:15 am</option>
                                            <option value="7:30 am">7:30 am</option>
                                            <option value="7:45 am">7:45 am</option>
                                            <option value="8:00 am">8:00 am</option>
                                            <option value="8:15 am">8:15 am</option>
                                            <option value="8:30 am">8:30 am</option>
                                            <option value="8:45 am">8:45 am</option>
                                            <option value="9:00 am">9:00 am</option>
                                            <option value="9:15 am">9:15 am</option>
                                            <option value="9:30 am">9:30 am</option>
                                            <option value="9:45 am">9:45 am</option>
                                            <option value="10:00 am">10:00 am</option>
                                            <option value="10:15 am">10:15 am</option>
                                            <option value="10:30 am">10:30 am</option>
                                            <option value="10:45 am">10:45 am</option>
                                            <option value="11:00 am">11:00 am</option>
                                            <option value="11:15 am">11:15 am</option>
                                            <option value="11:30 am">11:30 am</option>
                                            <option value="11:45 am">11:45 am</option>
                                            <option value="12:00 pm">12:00 pm</option>
                                            <option value="12:15 pm">12:15 pm</option>
                                            <option value="12:30 pm">12:30 pm</option>
                                            <option value="12:45 pm">12:45 pm</option>
                                            <option value="1:00 pm">1:00 pm</option>
                                            <option value="1:15 pm">1:15 pm</option>
                                            <option value="1:30 pm">1:30 pm</option>
                                            <option value="1:45 pm">1:45 pm</option>
                                            <option value="2:00 pm">2:00 pm</option>
                                            <option value="2:15 pm">2:15 pm</option>
                                            <option value="2:30 pm">2:30 pm</option>
                                            <option value="2:45 pm">2:45 pm</option>
                                            <option value="3:00 pm">3:00 pm</option>
                                            <option value="3:15 pm">3:15 pm</option>
                                            <option value="3:30 pm">3:30 pm</option>
                                            <option value="3:45 pm">3:45 pm</option>
                                            <option value="4:00 pm">4:00 pm</option>
                                            <option value="4:15 pm">4:15 pm</option>
                                            <option value="4:30 pm">4:30 pm</option>
                                            <option value="4:45 pm">4:45 pm</option>
                                            <option value="5:00 pm">5:00 pm</option>
                                            <option value="5:15 pm">5:15 pm</option>
                                            <option value="5:30 pm">5:30 pm</option>
                                            <option value="5:45 pm">5:45 pm</option>
                                            <option value="6:00 pm">6:00 pm</option>
                                            <option value="6:15 pm">6:15 pm</option>
                                            <option value="6:30 pm">6:30 pm</option>
                                            <option value="6:45 pm">6:45 pm</option>
                                            <option value="7:00 pm">7:00 pm</option>
                                            <option value="7:15 pm">7:15 pm</option>
                                            <option value="7:30 pm">7:30 pm</option>
                                            <option value="7:45 pm">7:45 pm</option>
                                            <option value="8:00 pm">8:00 pm</option>
                                            <option value="8:15 pm">8:15 pm</option>
                                            <option value="8:30 pm">8:30 pm</option>
                                            <option value="8:45 pm">8:45 pm</option>
                                            <option value="9:00 pm">9:00 pm</option>
                                            <option value="9:15 pm">9:15 pm</option>
                                            <option value="9:30 pm">9:30 pm</option>
                                            <option value="9:45 pm">9:45 pm</option>
                                            <option value="10:00 pm">10:00 pm</option>
                                            <option value="10:15 pm">10:15 pm</option>
                                            <option value="10:30 pm">10:30 pm</option>
                                            <option value="10:45 pm">10:45 pm</option>
                                            <option value="11:00 pm">11:00 pm</option>
                                            <option value="11:15 pm">11:15 pm</option>
                                            <option value="11:30 pm">11:30 pm</option>
                                            <option value="11:45 pm">11:45 pm</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="button" name="previous" class="action-button-previous" id="prev2" value="Previous"/>
                        <input type="submit" name="submit" id="fsub" class="action-button" value="Submit"/>
                    </fieldset>
                </form>
		    </div>
		</div>
	</div>
</section>

@include('footer')