<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Alunos</a></li>
                                <li><a href="#reviews">Professores</a></li>
                                <li><a href="#INFORMATION">Administradores</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <?php
                               foreach ($alunos as $linha) {
                                   echo $linha->inf_name."<br>";
                               }

                                ?>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad addcoursepro">
                                                    <form action="#" class="dropzone dropzone-custom needsclick addlibrary" id="demo1-upload">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <input name="nameasset" type="text" class="form-control" placeholder="Name of Asset" value="Web Development">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="subject" type="text" class="form-control" placeholder="Subject" value="Html Website">
                                                                </div>
                                                                <div class="form-group alert-up-pd">
                                                                    <div class="dz-message needsclick download-custom">
                                                                        <i class="fa fa-download edudropnone" aria-hidden="true"></i>
                                                                        <h2 class="edudropnone">Drop image here or click to upload.</h2>
                                                                        <p class="edudropnone"><span class="note needsclick">(This is just a demo dropzone. Selected image is <strong>not</strong> actually uploaded.)</span>
                                                                        </p>
                                                                        <input name="imageico" class="hd-pro-img" type="text" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <input name="department" type="text" class="form-control" placeholder="Department" value="CSE">
                                                                </div>
                                                                <div class="form-group res-mg-t-15">
                                                                    <input name="type" type="text" class="form-control" placeholder="Type" value="Book">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="price" type="text" class="form-control" placeholder="Price" value="$1500">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="year" type="text" class="form-control" placeholder="Year" value="1 Year">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="status" type="text" class="form-control" placeholder="Status" value="active">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress mg-t-15 responsive-mg-t-0">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="reviews">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <?php
                               foreach ($professores as $linha) {
                                   echo $linha->inf_name."<br>";
                               }

                                ?>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="devit-card-custom">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Email">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" placeholder="Phone">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" placeholder="Password">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" placeholder="Confirm Password">
                                                            </div>
                                                            <a href="#!" class="btn btn-primary waves-effect waves-light">Submit</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                        <div class="row">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="devit-card-custom">
                               <?php
                               foreach ($adms as $linha) {
                                   echo $linha->inf_name."<br>";
                               }

                                ?>
                              <div class="form-group">
                                <input type="url" class="form-control" placeholder="Facebook URL">
                              </div>
                              <div class="form-group">
                                <input type="url" class="form-control" placeholder="Twitter URL">
                              </div>
                              <div class="form-group">
                                <input type="url" class="form-control" placeholder="Google Plus">
                              </div>
                              <div class="form-group">
                                <input type="url" class="form-control" placeholder="Linkedin URL">
                              </div>
                              <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                            </div>
                          </div>
                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>