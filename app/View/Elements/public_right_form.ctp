
<!--Right Section-->
<div class="right_section">
	<div class="contact_form">
		<div class="contact_header">
			<div class="contact_icon"></div>
			<p class="cont_h_txt">Quick Contact Form</p>
		</div>

		<form class="right_form">
			Name:<input type="text" name="name" class="input_form" /> Your Email
			Id:<input type="text" name="email" class="input_form" /> Contact No.<input
				type="text" name="number" class="input_form" /> Message:
			<textarea name="message" style="height: 80px;" class="input_form"></textarea>
			<input type="submit" value="Submit" class="form_submit" />
		</form>

	</div>


	<div class="ads">
		<img src="<?php echo $this->Html->url('/img/');?>images/ads.png" />
	</div>

	<div class="m_calculator">
		<div class="contact_header">
			<div class="calculator_icon"></div>
			<p class="cal_h_txt">Mortgage Calculator</p>
			<form>
				<p class="mortgage">
					Home Value:<input type="text" name="home_value" class="m_input" />$
				</p>
				<p class="mortgage">
					Loan Value:<input type="text" name="home_value" class="m_input" />$
				</p>
				<p class="mortgage">
					Loan Perpose:<select class="m_input">
						<option></option>
					</select>

				</p>
				<p class="mortgage">
					Interest Rate:<input type="text" name="home_value" class="m_input" />%
				</p>

				<p class="mortgage">
					<b style="color: #F00; text-decoration: underline;">Get Today's
						Best Mortgage Rates</b>
				</p>

				<p class="mortgage">
					Loan Term:<input type="text" name="home_value" class="m_input" />Years
				</p>
				<p class="mortgage">
					Property Tax:<input type="text" name="home_value" class="m_input" />%
				</p>
				<p class="mortgage">
					PMI:<input type="text" name="home_value" class="m_input" />%
				</p>
				<p class="calculate_btn">
					<input type="button" name="calculator" value="calculate" />
				</p>


			</form>
		</div>

	</div>


</div>

<!--Right Section End-->
