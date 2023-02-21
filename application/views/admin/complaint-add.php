<div class="right_col" role="main">
          <div class="">
            <div class="page-title" style="display:flex;justify-content:center;">
              <div class="title_left">
                <h3 style="display:flex;justify-content:center;">{heading}</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row" style="display:flex;justify-content:center;">
              <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                 <div class="x_panel  center">
                <div class="x_title">
                  <h2>Registration Form</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <!-- start form for validation -->
                  <form id="demo-form" data-parsley-validate >
                    <label for="fullname">Full Name * :</label>
                    <input type="text" id="fullname" class="form-control" name="fullname" required />

                    <label for="email">Email * :</label>
                    <input type="email" id="email" class="form-control" name="email" data-parsley-trigger="change"
                      required />

                    <label>Gender *:</label>
                    <p>
                      M:
                      <input type="radio" class="flat" name="gender" id="genderM" value="M" checked="" required /> F:
                      <input type="radio" class="flat" name="gender" id="genderF" value="F" />
                    </p>

                    <label>Hobbies (2 minimum):</label>
                    <p style="padding: 5px;">
                      <input type="checkbox" name="hobbies[]" id="hobby1" value="ski" data-parsley-mincheck="2" required
                        class="flat" /> Skiing
                      <br />

                      <input type="checkbox" name="hobbies[]" id="hobby2" value="run" class="flat" /> Running
                      <br />

                      <input type="checkbox" name="hobbies[]" id="hobby3" value="eat" class="flat" /> Eating
                      <br />

                      <input type="checkbox" name="hobbies[]" id="hobby4" value="sleep" class="flat" /> Sleeping
                      <br />
                    <p>

                      <label for="heard">Heard us by *:</label>
                      <select id="heard" class="form-control" required>
                        <option value="">Choose..</option>
                        <option value="press">Press</option>
                        <option value="net">Internet</option>
                        <option value="mouth">Word of mouth</option>
                      </select>

                      <label for="message">Message (20 chars min, 100 max) :</label>
                      <textarea id="message" required="required" class="form-control" name="message"
                        data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100"
                        data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                        data-parsley-validation-threshold="10"></textarea>

                      <br />
                      <span class="btn btn-primary">Validate form</span>

                  </form>
                  <!-- end form for validations -->

                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
