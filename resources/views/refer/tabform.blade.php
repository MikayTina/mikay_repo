  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                 <!-- <fieldset style="margin-bottom: 30px;margin-left: 0px;">-->
              
                      <button id="add-patient-refer" name="add-patient-refer" class="btn btn-dark btn-block" style="height: 50px; width:200px;float: right;margin-top: 0px;margin-left: 120px">Refer Patient</button>
                        <br>
                        <br>
                      
                        <div class="card-body" style="margin-left: 10px">
                          <div class="table-responsive">
                              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                  <tr>
                                    <th>Date</th>
                                    <th>Refer At</th>
                                    <th>Reason of Referal</th>
                                    <th>Refered by</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody id="links-list" name="links-list">
                                    @foreach ($refers as $refer)
                                    <tr id="refer{{$refer->id}}">
                                    <td>{{$refer->ref_date}}</td>
                                    <td>{{$refer->ref_at}}</td>
                                    <td>{{$refer->ref_reason}}</td>
                                    <td>{{$refer->ref_by}}</td>
                              <td>
                                @if($refer->accepted_by)
                                <button class="btn btn-info view-refer-patient-modal" value="{{$refer->id}}">View
                                  </button>
                                  <button class="btn btn-light print-link" id="btn-print" name ="btn-print" value="{{$refer->id}}">Print
                                  </button>

                                @else
                                  <button class="btn btn-info edit-refer-modal" value="{{$refer->id}}">Edit
                                  </button>
                                  <button class="btn btn-secondary accept_patient_referal" id="btn-accept" name ="btn-accept" value="{{$refer->id}}">Accept
                                  </button>
                                  <button class="btn btn-light print-link" id="btn-ptint" name ="btn-print" value="{{$refer->id}}">Print
                                  </button>
                                @endif 
                              </td>
                          </tr>
                          @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
  </div>

                      <!--modal for Refer Button-->
  <div class="modal fade" id="linkEditorModal" aria-hidden="true" >
          <div class="modal-dialog">
                  <div class="modal-content"  style="width:980px;">
                              <div class="modal-header">
                                  <h4 class="modal-title" id="linkEditorModalLabel">Referal Slip (Two Way Referal System)</h4>
                              </div>
                              <div class="modal-body">
                                   <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">
                                     <table style="width:100%">
                                      <tr>
                                      <td style="width:25%">Last Name:</th>
                                      <td style="width:25%">{{$pats->lname}}</td>
                                      <td style="width:25%" colspan="2" rowspan="2">Address: &emsp;{{$pats->address->street}} {{$pats->address->barangay}} {{$pats->address->city}}</td>
                                      </tr>
        
                                      <tr>
                                      <td style="width:25%">First Name:</td><td style="width:25%"> {{$pats->fname}}</td>
                                        </tr>
        
                                       <tr>
                                        <td style="width:25%">Case New( ) old ( )</td>
                                        <td style="width:25%">Middle initial:  &emsp; {{$pats->mname}}</td>
                                        <td style="width:25%">Contact Number:</td>
                                        <td style="width:25%">{{$pats->contact}}</td>
                                      </tr>
        
                                      <tr>
                                      <td style="width:25%">Age:</td>
                                      <td style="width:25%">{{$pats->age}}</td>
                                      <td style="width:25%">Gender:</td>
                                      <td style="width:25%">{{$pats->gender}}</td>
                                      </tr>
        
                                        <tr>
                                        <td style="width:25%">Birthdate:</td>
                                        <td style="width:25%">{{$pats->birthdate}}</td>
                                        <td style="width:25%">Date of referral:</td>
                                        <td style="width:25%"><input style="width: 230px;" type="date" value="<?php echo $today; ?>" id="refDate" name="refDate" required></td>
                                        </tr>
                                        
                                        <tr>
                                        <td style="width:25%" height="70px">Refered at:</td>
                                        <td style="width:25%"><input type="text" style="height:70px; width: 230px;"  id="refAt" name="refAt"  /></td>
                                        <td style="width:25%">Reason for Referral:</td>
                                        <td style="width:25%"><input style="height:70px; width: 230px;" type="text" id="reason" name="reason" required="required" /></td>
                                        </tr>
                                        
                                        <tr>
                                        <td style="width:25%">Contact Person:</td>
                                        <td style="width:25%"><input style="width: 230px;" type="text" id="contactPer" name="contactPer" required="required"></td>
                                        <td style="width:25%">Refered by: </td>
                                        <td style="width:25%"><input  style="width: 230px;" type="text" id="refby" name="refby" value="{{Auth::user()->id}}" hidden="hidden"><input  style="width: 230px;" type="text" id="refby2" name="refby2" value="{{Auth::user()->fname}} {{Auth::user()->lname}}" disabled="disabled"></td>
                                        </tr>
                                        
                                        <tr>
                                        <td height="70px" colspan="4"><label> Recommendation/Attachments: </label> &emsp;<input style="height:70px; width: 670px;" type="text" id="ref_recom" name="ref_recom" required="required"/></td>
                                        </tr>
                                        
                                        <tr>
                                        <td style="width:25%">Refered back on(date)</td>
                                        <td style="width:25%"><input style="width: 230px;" type="date" id="refDateback" name="refDateback" ></td>
                                        <td style="width:25%">Refered back by:</td>
                                        <td style="width:25%"><input style="width: 230px;" type="text" id="refbyback" name="refbyback" /></td>
                                        </tr>
                                        
                                        <tr>
                                        <td style="width:25%" height="70px">Accepted by:</td>
                                        <td style="width:25%"></td>
                                        <td style="width:25%">Referal slip return on</td>
                                        <td style="width:25%"><input style="width: 230px;" type="date" id="returnDate" name="returnDate" ></td>
                                        </tr>
                                        
                                        
                                      </table>
                                    </form>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-primary" id="btn-save" name ="btn-save" value="add">Save changes
                                  </button>
                                  <input type="hidden" id="id" name="id" value="0">
                                  <input type="hidden" id="patient_id" name="patient_id" value="{{$pats->id}}">
                                  <input type="hidden" id="user_accepted" name="user_accepted" value="{{Auth::user()->id}}">


                              </div>
                  </div>
          </div>
  </div>


                       <!--modal for Refer Button-->
  <div class="modal fade" id="viewModal" aria-hidden="true" >
          <div class="modal-dialog">
                  <div class="modal-content"  style="width:980px;">
                              <div class="modal-header">
                                  <h4 class="modal-title" id="viewModalLabel">Referal Slip (Two Way Referal System)</h4>
                              </div>
                              <div class="modal-body">
                                   <form id="viewFormData" name="viewFormData" class="form-horizontal" novalidate="">
                                     <table style="width:100%">
                                      <tr>
                                      <td style="width:25%">Last Name:</th>
                                      <td style="width:25%">{{$pats->lname}}</td>
                                      <td style="width:25%" colspan="2" rowspan="2">Address: &emsp;{{$pats->address->street}} {{$pats->address->barangay}} {{$pats->address->city}}</td>
                                      </tr>
        
                                      <tr>
                                      <td style="width:25%">First Name:</td><td style="width:25%"> {{$pats->fname}}</td>
                                        </tr>
        
                                       <tr>
                                        <td style="width:25%">Case New( ) old ( )</td>
                                        <td style="width:25%">Middle initial:  &emsp; {{$pats->mname}}</td>
                                        <td style="width:25%">Contact Number:</td>
                                        <td style="width:25%">{{$pats->contact}}</td>
                                      </tr>
        
                                      <tr>
                                      <td style="width:25%">Age:</td>
                                      <td style="width:25%">{{$pats->age}}</td>
                                      <td style="width:25%">Gender:</td>
                                      <td style="width:25%">{{$pats->gender}}</td>
                                      </tr>
        
                                        <tr>
                                        <td style="width:25%">Birthdate:</td>
                                        <td style="width:25%">{{$pats->birthdate}}</td>
                                        <td style="width:25%">Date of referral:</td>
                                        <td style="width:25%">

                                        <input style="width: 230px;" class="myinput" type="date" value="<?php echo $today; ?>" id="refDate" name="refDate" readonly="readonly" class="myinput" ></td>
                                        </tr>
                                        
                                        <tr>
                                        <td style="width:25%" height="70px">Refered at:</td>
                                        <td style="width:25%"><input type="text" class="myinput" style="height:70px; width: 230px;"  id="refAt2" name="refAt2"  /></td>
                                        <td style="width:25%">Reason for Referral:</td>
                                        <td style="width:25%"><input style="height:70px; width: 230px;" type="text" id="reason2" name="reason2" readonly="readonly" class="myinput"/></td>
                                        </tr>
                                        
                                        <tr>
                                        <td style="width:25%">Contact Person:</td>
                                        <td style="width:25%"><input style="width: 230px;" type="text" id="contact2" name="contact2" readonly="readonly" class="myinput" ></td>
                                        <td style="width:25%">Refered by: </td>
                                        <td style="width:25%"><input  style="width: 230px;" type="text" id="refby" name="refby" value="{{Auth::user()->id}}" hidden="hidden"><input  style="width: 230px;" type="text" id="refby22" name="refby22" readonly="readonly" class="myinput"></td>
                                        </tr>
                                        
                                        <tr>
                                        <td height="70px" colspan="4"><label> Recommendation/Attachments: </label> &emsp;<input style="height:70px; width: 670px;" type="text" id="ref_recom2" name="ref_recom2" readonly="readonly" class="myinput" /></td>
                                        </tr>
                                        
                                        <tr>
                                        <td style="width:25%">Refered back on(date)</td>
                                        <td style="width:25%"><input style="width: 230px;" type="date" id="refDateback2" name="refDateback2" readonly="readonly" class="myinput" ></td>
                                        <td style="width:25%">Refered back by:</td>
                                        <td style="width:25%"><input style="width: 230px;" type="text" id="refbyback2" name="refbyback2" readonly="readonly" class="myinput" /></td>
                                        </tr>
                                        
                                        <tr>
                                        <td style="width:25%" height="70px">Accepted by:</td>
                                        <td style="width:25%"><input style="width: 230px;" type="text" id="accepted_by2" name="accepted_by2" readonly="readonly" class="myinput" ></td>
                                        <td style="width:25%">Referal slip return on</td>
                                        <td style="width:25%"><input style="width: 230px;" type="date" id="returnDate2" name="returnDate2" readonly="readonly" class="myinput" ></td>
                                        </tr>
                                        
                                        
                                      </table>
                                    </form>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-primary" id="btn-save" name ="btn-save" value="add">Save changes
                                  </button>
                                  <input type="hidden" id="id" name="id" value="0">
                                  <input type="hidden" id="patient_id" name="patient_id" value="{{$pats->id}}">
                                  <input type="hidden" id="user_accepted" name="user_accepted" value="{{Auth::user()->id}}">


                              </div>
                  </div>
          </div>
  </div>

   <div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                 <!-- <fieldset style="margin-bottom: 30px;margin-left: 0px;">-->
              
                 <button id="btn-visit" name="btn-visit" class="btn btn-dark btn-block" style="height: 50px; width:200px;float: right;margin-top: 0px;margin-left: 120px">Patient Visit</button>
                        <br>

                        <div class="row" style="margin-left: 10px;margin-bottom: 50px; margin-top: 70px">
                        
                        @foreach ($visits as $pat_visit)
                         
                        <div class="col-xl-2 col-sm-3 mb-5" style="height: 5rem;margin-top: 2px">
                        <div class="card border-dark mb-3 text-black o-hidden h-100">
                          <div class="card-body open_modal">
                           <a href="#"><p style="font-size: 12px;margin-top: 2px">{{$pat_visit->date}}<br> {{$pat_visit->events->title}}</p></a>
                          <div class="mr-5"></div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      </div>          

  </div>

    <div class="modal fade" id="linkEditor" aria-hidden="true" >
                <div class="modal-dialog">
                    <div class="modal-content"  style="width:980px;">
                        <div class="modal-header">
                            <h4 class="modal-title" id="linkEditorModalLabel">Add Intervention the Patient Attended</h4>
                        </div>
                        <div class="modal-body">
                            <form id="linkeditor_Data" name="linkeditor_Data" class="form-horizontal" novalidate="">

                                @foreach($intv as $interven)
                                  <div>
                                    <input type="hidden" name="rec_id_{{$interven->id}}" id="rec_id_{{$interven->id}}" value="">
                                    <div class="checkboxs" id="checkboxes_{{$interven->id}}">
                                      <label><input type="checkbox" class="checkitems" id="checkitem[]" name="checkitem[]" style="zoom:1.5;font-size: 28px;"  value="{{$interven->id}}">{{$interven->interven_name}}</label>
                                    </div>

                                  @foreach($childIntervens->groupby('parent') as  $name => $member)

                                    @if($name  == $interven->id)

                                <div class="form-label-group select1" id="select_{{$interven->id}}" name="select_{{$interven->id}}"  style="display: none;">

                                  <select class="form-control col-md-6" id="childInterven_{{$interven->id}}"  name="childInterven_{{$interven->id}}" style=" margin-bottom: 10px">
                                    @foreach($member as $item)
                                      <option value="{{ $item['id']}}">{{  $item['interven_name'] }}</option>
                                          @endforeach
                                    </select>
                                  </div>
                                    @endif

                                  @endforeach
                                    <div class="form-label-group textboxes" id="textboxes_{{$interven->id}}" style="display: none;">
                                        <input style="margin-left:0px" type="text" class="form-control" placeholder="Remarks" name="remarks_{{$interven->id}}" id="remarks_{{$interven->id}}">
                                     </div>
                                   </br>
                                  </div>
                                @endforeach
                                  
                          </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary"  id="btn-attended" name ="btn-attended" value="add">Save changes
                            </button>
                            <input type="hidden" id="evts_id" name="evts_id" value="">
                            <input type="hidden" id="patient_interven_id" name="patient_interven_id" value="">
                            <input type="hidden" id="patient_interven_id" name="patient_interven_id" value="">


                        </div>
                    </div>
                </div>
            </div>