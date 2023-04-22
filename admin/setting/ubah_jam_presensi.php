<?php
session_start();
$username = $_SESSION['username'];
$login			= $_SESSION['login'];

if ($login != 12) {
	session_destroy();
	header('Location: login.php');
}
$lihat = mysqli_query($database, "select * from setting where no='1'");
$data = mysqli_fetch_array($lihat);
?>
<div class="templatemo-content-widget white-bg col-2" style="position:inherit">
	<div style="background-color: #731514; padding: 15px; color: #fff; border-radius: 5px;">
		<i class="fa fa-clock-o fa-lg"></i> &nbsp
		<h2 class="templatemo-inline-block">SETTING JAM MASUK</h2>
	</div>
	<hr>
	<form action="" name="form_tambah" method="post" enctype="multipart/form-data" class="templatemo-login-form">
		<table class="ttable table_input" align="center">
			<tr>
				<td><label for="jam">Jam Masuk</label></td>
				<td>:</td>
				<td><select name="jam_presensi" id="jam" required title="Jam Harus diIsi" class="form-control">
						<option selected default disabled>Jam</option>
						<option <?php if ($data['jam_presensi'] == '00') {
									echo "selected";
								}; ?> value="00">00</option>
						<option <?php if ($data['jam_presensi'] == '01') {
									echo "selected";
								}; ?> value="01">01</option>
						<option <?php if ($data['jam_presensi'] == '02') {
									echo "selected";
								}; ?> value="02">02</option>
						<option <?php if ($data['jam_presensi'] == '03') {
									echo "selected";
								}; ?> value="03">03</option>
						<option <?php if ($data['jam_presensi'] == '04') {
									echo "selected";
								}; ?> value="04">04</option>
						<option <?php if ($data['jam_presensi'] == '05') {
									echo "selected";
								}; ?> value="05">05</option>
						<option <?php if ($data['jam_presensi'] == '06') {
									echo "selected";
								}; ?> value="06">06</option>
						<option <?php if ($data['jam_presensi'] == '07') {
									echo "selected";
								}; ?> value="07">07</option>
						<option <?php if ($data['jam_presensi'] == '08') {
									echo "selected";
								}; ?> value="08">08</option>
						<option <?php if ($data['jam_presensi'] == '09') {
									echo "selected";
								}; ?> value="09">09</option>
						<option <?php if ($data['jam_presensi'] == '10') {
									echo "selected";
								}; ?> value="10">10</option>
						<option <?php if ($data['jam_presensi'] == '11') {
									echo "selected";
								}; ?> value="11">11</option>
						<option <?php if ($data['jam_presensi'] == '12') {
									echo "selected";
								}; ?> value="12">12</option>
						<option <?php if ($data['jam_presensi'] == '13') {
									echo "selected";
								}; ?> value="13">13</option>
						<option <?php if ($data['jam_presensi'] == '14') {
									echo "selected";
								}; ?> value="14">14</option>
						<option <?php if ($data['jam_presensi'] == '15') {
									echo "selected";
								}; ?> value="15">15</option>
						<option <?php if ($data['jam_presensi'] == '16') {
									echo "selected";
								}; ?> value="16">16</option>
						<option <?php if ($data['jam_presensi'] == '17') {
									echo "selected";
								}; ?> value="17">17</option>
						<option <?php if ($data['jam_presensi'] == '18') {
									echo "selected";
								}; ?> value="18">18</option>
						<option <?php if ($data['jam_presensi'] == '19') {
									echo "selected";
								}; ?> value="19">19</option>
						<option <?php if ($data['jam_presensi'] == '20') {
									echo "selected";
								}; ?> value="20">20</option>
						<option <?php if ($data['jam_presensi'] == '21') {
									echo "selected";
								}; ?> value="21">21</option>
						<option <?php if ($data['jam_presensi'] == '22') {
									echo "selected";
								}; ?> value="22">22</option>
						<option <?php if ($data['jam_presensi'] == '23') {
									echo "selected";
								}; ?> value="23">23</option>
					</select>
				</td>
				<td><select name="menit_presensi" id="menit" required title="Menit Harus diIsi" class="form-control">
						<option selected default disabled>Menit</option>
						<option <?php if ($data['menit_presensi'] == '00') {
									echo "selected";
								}; ?> value="00">00</option>
						<option <?php if ($data['menit_presensi'] == '01') {
									echo "selected";
								}; ?> value="01">01</option>
						<option <?php if ($data['menit_presensi'] == '02') {
									echo "selected";
								}; ?> value="02">02</option>
						<option <?php if ($data['menit_presensi'] == '03') {
									echo "selected";
								}; ?> value="03">03</option>
						<option <?php if ($data['menit_presensi'] == '04') {
									echo "selected";
								}; ?> value="04">04</option>
						<option <?php if ($data['menit_presensi'] == '05') {
									echo "selected";
								}; ?> value="05">05</option>
						<option <?php if ($data['menit_presensi'] == '06') {
									echo "selected";
								}; ?> value="06">06</option>
						<option <?php if ($data['menit_presensi'] == '07') {
									echo "selected";
								}; ?> value="07">07</option>
						<option <?php if ($data['menit_presensi'] == '08') {
									echo "selected";
								}; ?> value="08">08</option>
						<option <?php if ($data['menit_presensi'] == '09') {
									echo "selected";
								}; ?> value="09">09</option>
						<option <?php if ($data['menit_presensi'] == '10') {
									echo "selected";
								}; ?> value="10">10</option>
						<option <?php if ($data['menit_presensi'] == '11') {
									echo "selected";
								}; ?> value="11">11</option>
						<option <?php if ($data['menit_presensi'] == '12') {
									echo "selected";
								}; ?> value="12">12</option>
						<option <?php if ($data['menit_presensi'] == '13') {
									echo "selected";
								}; ?> value="13">13</option>
						<option <?php if ($data['menit_presensi'] == '14') {
									echo "selected";
								}; ?> value="14">14</option>
						<option <?php if ($data['menit_presensi'] == '15') {
									echo "selected";
								}; ?> value="15">15</option>
						<option <?php if ($data['menit_presensi'] == '16') {
									echo "selected";
								}; ?> value="16">16</option>
						<option <?php if ($data['menit_presensi'] == '17') {
									echo "selected";
								}; ?> value="17">17</option>
						<option <?php if ($data['menit_presensi'] == '18') {
									echo "selected";
								}; ?> value="18">18</option>
						<option <?php if ($data['menit_presensi'] == '19') {
									echo "selected";
								}; ?> value="19">19</option>
						<option <?php if ($data['menit_presensi'] == '20') {
									echo "selected";
								}; ?> value="20">20</option>
						<option <?php if ($data['menit_presensi'] == '21') {
									echo "selected";
								}; ?> value="21">21</option>
						<option <?php if ($data['menit_presensi'] == '22') {
									echo "selected";
								}; ?> value="22">22</option>
						<option <?php if ($data['menit_presensi'] == '23') {
									echo "selected";
								}; ?> value="23">23</option>
						<option <?php if ($data['menit_presensi'] == '24') {
									echo "selected";
								}; ?> value="24">24</option>
						<option <?php if ($data['menit_presensi'] == '25') {
									echo "selected";
								}; ?> value="25">25</option>
						<option <?php if ($data['menit_presensi'] == '26') {
									echo "selected";
								}; ?> value="26">26</option>
						<option <?php if ($data['menit_presensi'] == '27') {
									echo "selected";
								}; ?> value="27">27</option>
						<option <?php if ($data['menit_presensi'] == '28') {
									echo "selected";
								}; ?> value="28">28</option>
						<option <?php if ($data['menit_presensi'] == '29') {
									echo "selected";
								}; ?> value="29">29</option>
						<option <?php if ($data['menit_presensi'] == '30') {
									echo "selected";
								}; ?> value="30">30</option>
						<option <?php if ($data['menit_presensi'] == '31') {
									echo "selected";
								}; ?> value="31">31</option>
						<option <?php if ($data['menit_presensi'] == '32') {
									echo "selected";
								}; ?> value="32">32</option>
						<option <?php if ($data['menit_presensi'] == '33') {
									echo "selected";
								}; ?> value="33">33</option>
						<option <?php if ($data['menit_presensi'] == '34') {
									echo "selected";
								}; ?> value="34">34</option>
						<option <?php if ($data['menit_presensi'] == '35') {
									echo "selected";
								}; ?> value="35">35</option>
						<option <?php if ($data['menit_presensi'] == '36') {
									echo "selected";
								}; ?> value="36">36</option>
						<option <?php if ($data['menit_presensi'] == '37') {
									echo "selected";
								}; ?> value="37">37</option>
						<option <?php if ($data['menit_presensi'] == '38') {
									echo "selected";
								}; ?> value="38">38</option>
						<option <?php if ($data['menit_presensi'] == '39') {
									echo "selected";
								}; ?> value="39">39</option>
						<option <?php if ($data['menit_presensi'] == '40') {
									echo "selected";
								}; ?> value="40">40</option>
						<option <?php if ($data['menit_presensi'] == '41') {
									echo "selected";
								}; ?> value="41">41</option>
						<option <?php if ($data['menit_presensi'] == '42') {
									echo "selected";
								}; ?> value="42">42</option>
						<option <?php if ($data['menit_presensi'] == '43') {
									echo "selected";
								}; ?> value="43">43</option>
						<option <?php if ($data['menit_presensi'] == '44') {
									echo "selected";
								}; ?> value="44">44</option>
						<option <?php if ($data['menit_presensi'] == '45') {
									echo "selected";
								}; ?> value="45">45</option>
						<option <?php if ($data['menit_presensi'] == '46') {
									echo "selected";
								}; ?> value="46">46</option>
						<option <?php if ($data['menit_presensi'] == '47') {
									echo "selected";
								}; ?> value="47">47</option>
						<option <?php if ($data['menit_presensi'] == '48') {
									echo "selected";
								}; ?> value="48">48</option>
						<option <?php if ($data['menit_presensi'] == '49') {
									echo "selected";
								}; ?> value="49">49</option>
						<option <?php if ($data['menit_presensi'] == '50') {
									echo "selected";
								}; ?> value="50">50</option>
						<option <?php if ($data['menit_presensi'] == '51') {
									echo "selected";
								}; ?> value="51">51</option>
						<option <?php if ($data['menit_presensi'] == '52') {
									echo "selected";
								}; ?> value="52">52</option>
						<option <?php if ($data['menit_presensi'] == '53') {
									echo "selected";
								}; ?> value="53">53</option>
						<option <?php if ($data['menit_presensi'] == '54') {
									echo "selected";
								}; ?> value="54">54</option>
						<option <?php if ($data['menit_presensi'] == '55') {
									echo "selected";
								}; ?> value="55">55</option>
						<option <?php if ($data['menit_presensi'] == '56') {
									echo "selected";
								}; ?> value="56">56</option>
						<option <?php if ($data['menit_presensi'] == '57') {
									echo "selected";
								}; ?> value="57">57</option>
						<option <?php if ($data['menit_presensi'] == '58') {
									echo "selected";
								}; ?> value="58">58</option>
						<option <?php if ($data['menit_presensi'] == '59') {
									echo "selected";
								}; ?> value="59">59</option>

					</select>
				</td>
			</tr>
			<tr>
				<td><label for="tjam">Batas Waktu Terlambat Sebentar</label></td>
				<td>:</td>
				<td><select name="telat_jam_presensi" id="tjam" required title="Jam Harus diIsi" class="form-control">
						<option selected default disabled>Jam</option>
						<option <?php if ($data['telat_jam_presensi'] == '00') {
									echo "selected";
								}; ?> value="00">00</option>
						<option <?php if ($data['telat_jam_presensi'] == '01') {
									echo "selected";
								}; ?> value="01">01</option>
						<option <?php if ($data['telat_jam_presensi'] == '02') {
									echo "selected";
								}; ?> value="02">02</option>
						<option <?php if ($data['telat_jam_presensi'] == '03') {
									echo "selected";
								}; ?> value="03">03</option>
						<option <?php if ($data['telat_jam_presensi'] == '04') {
									echo "selected";
								}; ?> value="04">04</option>
						<option <?php if ($data['telat_jam_presensi'] == '05') {
									echo "selected";
								}; ?> value="05">05</option>
						<option <?php if ($data['telat_jam_presensi'] == '06') {
									echo "selected";
								}; ?> value="06">06</option>
						<option <?php if ($data['telat_jam_presensi'] == '07') {
									echo "selected";
								}; ?> value="07">07</option>
						<option <?php if ($data['telat_jam_presensi'] == '08') {
									echo "selected";
								}; ?> value="08">08</option>
						<option <?php if ($data['telat_jam_presensi'] == '09') {
									echo "selected";
								}; ?> value="09">09</option>
						<option <?php if ($data['telat_jam_presensi'] == '10') {
									echo "selected";
								}; ?> value="10">10</option>
						<option <?php if ($data['telat_jam_presensi'] == '11') {
									echo "selected";
								}; ?> value="11">11</option>
						<option <?php if ($data['telat_jam_presensi'] == '12') {
									echo "selected";
								}; ?> value="12">12</option>
						<option <?php if ($data['telat_jam_presensi'] == '13') {
									echo "selected";
								}; ?> value="13">13</option>
						<option <?php if ($data['telat_jam_presensi'] == '14') {
									echo "selected";
								}; ?> value="14">14</option>
						<option <?php if ($data['telat_jam_presensi'] == '15') {
									echo "selected";
								}; ?> value="15">15</option>
						<option <?php if ($data['telat_jam_presensi'] == '16') {
									echo "selected";
								}; ?> value="16">16</option>
						<option <?php if ($data['telat_jam_presensi'] == '17') {
									echo "selected";
								}; ?> value="17">17</option>
						<option <?php if ($data['telat_jam_presensi'] == '18') {
									echo "selected";
								}; ?> value="18">18</option>
						<option <?php if ($data['telat_jam_presensi'] == '19') {
									echo "selected";
								}; ?> value="19">19</option>
						<option <?php if ($data['telat_jam_presensi'] == '20') {
									echo "selected";
								}; ?> value="20">20</option>
						<option <?php if ($data['telat_jam_presensi'] == '21') {
									echo "selected";
								}; ?> value="21">21</option>
						<option <?php if ($data['telat_jam_presensi'] == '22') {
									echo "selected";
								}; ?> value="22">22</option>
						<option <?php if ($data['telat_jam_presensi'] == '23') {
									echo "selected";
								}; ?> value="23">23</option>
					</select>
				</td>
				<td><select name="telat_menit_presensi" id="tmenit" required title="Menit Harus diIsi" class="form-control">
						<option selected default disabled>Menit</option>
						<option <?php if ($data['telat_menit_presensi'] == '00') {
									echo "selected";
								}; ?> value="00">00</option>
						<option <?php if ($data['telat_menit_presensi'] == '01') {
									echo "selected";
								}; ?> value="01">01</option>
						<option <?php if ($data['telat_menit_presensi'] == '02') {
									echo "selected";
								}; ?> value="02">02</option>
						<option <?php if ($data['telat_menit_presensi'] == '03') {
									echo "selected";
								}; ?> value="03">03</option>
						<option <?php if ($data['telat_menit_presensi'] == '04') {
									echo "selected";
								}; ?> value="04">04</option>
						<option <?php if ($data['telat_menit_presensi'] == '05') {
									echo "selected";
								}; ?> value="05">05</option>
						<option <?php if ($data['telat_menit_presensi'] == '06') {
									echo "selected";
								}; ?> value="06">06</option>
						<option <?php if ($data['telat_menit_presensi'] == '07') {
									echo "selected";
								}; ?> value="07">07</option>
						<option <?php if ($data['telat_menit_presensi'] == '08') {
									echo "selected";
								}; ?> value="08">08</option>
						<option <?php if ($data['telat_menit_presensi'] == '09') {
									echo "selected";
								}; ?> value="09">09</option>
						<option <?php if ($data['telat_menit_presensi'] == '10') {
									echo "selected";
								}; ?> value="10">10</option>
						<option <?php if ($data['telat_menit_presensi'] == '11') {
									echo "selected";
								}; ?> value="11">11</option>
						<option <?php if ($data['telat_menit_presensi'] == '12') {
									echo "selected";
								}; ?> value="12">12</option>
						<option <?php if ($data['telat_menit_presensi'] == '13') {
									echo "selected";
								}; ?> value="13">13</option>
						<option <?php if ($data['telat_menit_presensi'] == '14') {
									echo "selected";
								}; ?> value="14">14</option>
						<option <?php if ($data['telat_menit_presensi'] == '15') {
									echo "selected";
								}; ?> value="15">15</option>
						<option <?php if ($data['telat_menit_presensi'] == '16') {
									echo "selected";
								}; ?> value="16">16</option>
						<option <?php if ($data['telat_menit_presensi'] == '17') {
									echo "selected";
								}; ?> value="17">17</option>
						<option <?php if ($data['telat_menit_presensi'] == '18') {
									echo "selected";
								}; ?> value="18">18</option>
						<option <?php if ($data['telat_menit_presensi'] == '19') {
									echo "selected";
								}; ?> value="19">19</option>
						<option <?php if ($data['telat_menit_presensi'] == '20') {
									echo "selected";
								}; ?> value="20">20</option>
						<option <?php if ($data['telat_menit_presensi'] == '21') {
									echo "selected";
								}; ?> value="21">21</option>
						<option <?php if ($data['telat_menit_presensi'] == '22') {
									echo "selected";
								}; ?> value="22">22</option>
						<option <?php if ($data['telat_menit_presensi'] == '23') {
									echo "selected";
								}; ?> value="23">23</option>
						<option <?php if ($data['telat_menit_presensi'] == '24') {
									echo "selected";
								}; ?> value="24">24</option>
						<option <?php if ($data['telat_menit_presensi'] == '25') {
									echo "selected";
								}; ?> value="25">25</option>
						<option <?php if ($data['telat_menit_presensi'] == '26') {
									echo "selected";
								}; ?> value="26">26</option>
						<option <?php if ($data['telat_menit_presensi'] == '27') {
									echo "selected";
								}; ?> value="27">27</option>
						<option <?php if ($data['telat_menit_presensi'] == '28') {
									echo "selected";
								}; ?> value="28">28</option>
						<option <?php if ($data['telat_menit_presensi'] == '29') {
									echo "selected";
								}; ?> value="29">29</option>
						<option <?php if ($data['telat_menit_presensi'] == '30') {
									echo "selected";
								}; ?> value="30">30</option>
						<option <?php if ($data['telat_menit_presensi'] == '31') {
									echo "selected";
								}; ?> value="31">31</option>
						<option <?php if ($data['telat_menit_presensi'] == '32') {
									echo "selected";
								}; ?> value="32">32</option>
						<option <?php if ($data['telat_menit_presensi'] == '33') {
									echo "selected";
								}; ?> value="33">33</option>
						<option <?php if ($data['telat_menit_presensi'] == '34') {
									echo "selected";
								}; ?> value="34">34</option>
						<option <?php if ($data['telat_menit_presensi'] == '35') {
									echo "selected";
								}; ?> value="35">35</option>
						<option <?php if ($data['telat_menit_presensi'] == '36') {
									echo "selected";
								}; ?> value="36">36</option>
						<option <?php if ($data['telat_menit_presensi'] == '37') {
									echo "selected";
								}; ?> value="37">37</option>
						<option <?php if ($data['telat_menit_presensi'] == '38') {
									echo "selected";
								}; ?> value="38">38</option>
						<option <?php if ($data['telat_menit_presensi'] == '39') {
									echo "selected";
								}; ?> value="39">39</option>
						<option <?php if ($data['telat_menit_presensi'] == '40') {
									echo "selected";
								}; ?> value="40">40</option>
						<option <?php if ($data['telat_menit_presensi'] == '41') {
									echo "selected";
								}; ?> value="41">41</option>
						<option <?php if ($data['telat_menit_presensi'] == '42') {
									echo "selected";
								}; ?> value="42">42</option>
						<option <?php if ($data['telat_menit_presensi'] == '43') {
									echo "selected";
								}; ?> value="43">43</option>
						<option <?php if ($data['telat_menit_presensi'] == '44') {
									echo "selected";
								}; ?> value="44">44</option>
						<option <?php if ($data['telat_menit_presensi'] == '45') {
									echo "selected";
								}; ?> value="45">45</option>
						<option <?php if ($data['telat_menit_presensi'] == '46') {
									echo "selected";
								}; ?> value="46">46</option>
						<option <?php if ($data['telat_menit_presensi'] == '47') {
									echo "selected";
								}; ?> value="47">47</option>
						<option <?php if ($data['telat_menit_presensi'] == '48') {
									echo "selected";
								}; ?> value="48">48</option>
						<option <?php if ($data['telat_menit_presensi'] == '49') {
									echo "selected";
								}; ?> value="49">49</option>
						<option <?php if ($data['telat_menit_presensi'] == '50') {
									echo "selected";
								}; ?> value="50">50</option>
						<option <?php if ($data['telat_menit_presensi'] == '51') {
									echo "selected";
								}; ?> value="51">51</option>
						<option <?php if ($data['telat_menit_presensi'] == '52') {
									echo "selected";
								}; ?> value="52">52</option>
						<option <?php if ($data['telat_menit_presensi'] == '53') {
									echo "selected";
								}; ?> value="53">53</option>
						<option <?php if ($data['telat_menit_presensi'] == '54') {
									echo "selected";
								}; ?> value="54">54</option>
						<option <?php if ($data['telat_menit_presensi'] == '55') {
									echo "selected";
								}; ?> value="55">55</option>
						<option <?php if ($data['telat_menit_presensi'] == '56') {
									echo "selected";
								}; ?> value="56">56</option>
						<option <?php if ($data['telat_menit_presensi'] == '57') {
									echo "selected";
								}; ?> value="57">57</option>
						<option <?php if ($data['telat_menit_presensi'] == '58') {
									echo "selected";
								}; ?> value="58">58</option>
						<option <?php if ($data['telat_menit_presensi'] == '59') {
									echo "selected";
								}; ?> value="59">59</option>

					</select>
				</td>
			</tr>
			<tr>
				<td><label for="bjam">Batas Waktu Presensi</label></td>
				<td>:</td>
				<td><select name="jam_batas_presensi" id="tjam" required title="Jam Harus diIsi" class="form-control">
						<option selected default disabled>Jam</option>
						<option <?php if ($data['jam_batas_presensi'] == '00') {
									echo "selected";
								}; ?> value="00">00</option>
						<option <?php if ($data['jam_batas_presensi'] == '01') {
									echo "selected";
								}; ?> value="01">01</option>
						<option <?php if ($data['jam_batas_presensi'] == '02') {
									echo "selected";
								}; ?> value="02">02</option>
						<option <?php if ($data['jam_batas_presensi'] == '03') {
									echo "selected";
								}; ?> value="03">03</option>
						<option <?php if ($data['jam_batas_presensi'] == '04') {
									echo "selected";
								}; ?> value="04">04</option>
						<option <?php if ($data['jam_batas_presensi'] == '05') {
									echo "selected";
								}; ?> value="05">05</option>
						<option <?php if ($data['jam_batas_presensi'] == '06') {
									echo "selected";
								}; ?> value="06">06</option>
						<option <?php if ($data['jam_batas_presensi'] == '07') {
									echo "selected";
								}; ?> value="07">07</option>
						<option <?php if ($data['jam_batas_presensi'] == '08') {
									echo "selected";
								}; ?> value="08">08</option>
						<option <?php if ($data['jam_batas_presensi'] == '09') {
									echo "selected";
								}; ?> value="09">09</option>
						<option <?php if ($data['jam_batas_presensi'] == '10') {
									echo "selected";
								}; ?> value="10">10</option>
						<option <?php if ($data['jam_batas_presensi'] == '11') {
									echo "selected";
								}; ?> value="11">11</option>
						<option <?php if ($data['jam_batas_presensi'] == '12') {
									echo "selected";
								}; ?> value="12">12</option>
						<option <?php if ($data['jam_batas_presensi'] == '13') {
									echo "selected";
								}; ?> value="13">13</option>
						<option <?php if ($data['jam_batas_presensi'] == '14') {
									echo "selected";
								}; ?> value="14">14</option>
						<option <?php if ($data['jam_batas_presensi'] == '15') {
									echo "selected";
								}; ?> value="15">15</option>
						<option <?php if ($data['jam_batas_presensi'] == '16') {
									echo "selected";
								}; ?> value="16">16</option>
						<option <?php if ($data['jam_batas_presensi'] == '17') {
									echo "selected";
								}; ?> value="17">17</option>
						<option <?php if ($data['jam_batas_presensi'] == '18') {
									echo "selected";
								}; ?> value="18">18</option>
						<option <?php if ($data['jam_batas_presensi'] == '19') {
									echo "selected";
								}; ?> value="19">19</option>
						<option <?php if ($data['jam_batas_presensi'] == '20') {
									echo "selected";
								}; ?> value="20">20</option>
						<option <?php if ($data['jam_batas_presensi'] == '21') {
									echo "selected";
								}; ?> value="21">21</option>
						<option <?php if ($data['jam_batas_presensi'] == '22') {
									echo "selected";
								}; ?> value="22">22</option>
						<option <?php if ($data['jam_batas_presensi'] == '23') {
									echo "selected";
								}; ?> value="23">23</option>
					</select>
				</td>
				<td><select name="menit_batas_presensi" id="tmenit" required title="Menit Harus diIsi" class="form-control">
						<option selected default disabled>Menit</option>
						<option <?php if ($data['menit_batas_presensi'] == '00') {
									echo "selected";
								}; ?> value="00">00</option>
						<option <?php if ($data['menit_batas_presensi'] == '01') {
									echo "selected";
								}; ?> value="01">01</option>
						<option <?php if ($data['menit_batas_presensi'] == '02') {
									echo "selected";
								}; ?> value="02">02</option>
						<option <?php if ($data['menit_batas_presensi'] == '03') {
									echo "selected";
								}; ?> value="03">03</option>
						<option <?php if ($data['menit_batas_presensi'] == '04') {
									echo "selected";
								}; ?> value="04">04</option>
						<option <?php if ($data['menit_batas_presensi'] == '05') {
									echo "selected";
								}; ?> value="05">05</option>
						<option <?php if ($data['menit_batas_presensi'] == '06') {
									echo "selected";
								}; ?> value="06">06</option>
						<option <?php if ($data['menit_batas_presensi'] == '07') {
									echo "selected";
								}; ?> value="07">07</option>
						<option <?php if ($data['menit_batas_presensi'] == '08') {
									echo "selected";
								}; ?> value="08">08</option>
						<option <?php if ($data['menit_batas_presensi'] == '09') {
									echo "selected";
								}; ?> value="09">09</option>
						<option <?php if ($data['menit_batas_presensi'] == '10') {
									echo "selected";
								}; ?> value="10">10</option>
						<option <?php if ($data['menit_batas_presensi'] == '11') {
									echo "selected";
								}; ?> value="11">11</option>
						<option <?php if ($data['menit_batas_presensi'] == '12') {
									echo "selected";
								}; ?> value="12">12</option>
						<option <?php if ($data['menit_batas_presensi'] == '13') {
									echo "selected";
								}; ?> value="13">13</option>
						<option <?php if ($data['menit_batas_presensi'] == '14') {
									echo "selected";
								}; ?> value="14">14</option>
						<option <?php if ($data['menit_batas_presensi'] == '15') {
									echo "selected";
								}; ?> value="15">15</option>
						<option <?php if ($data['menit_batas_presensi'] == '16') {
									echo "selected";
								}; ?> value="16">16</option>
						<option <?php if ($data['menit_batas_presensi'] == '17') {
									echo "selected";
								}; ?> value="17">17</option>
						<option <?php if ($data['menit_batas_presensi'] == '18') {
									echo "selected";
								}; ?> value="18">18</option>
						<option <?php if ($data['menit_batas_presensi'] == '19') {
									echo "selected";
								}; ?> value="19">19</option>
						<option <?php if ($data['menit_batas_presensi'] == '20') {
									echo "selected";
								}; ?> value="20">20</option>
						<option <?php if ($data['menit_batas_presensi'] == '21') {
									echo "selected";
								}; ?> value="21">21</option>
						<option <?php if ($data['menit_batas_presensi'] == '22') {
									echo "selected";
								}; ?> value="22">22</option>
						<option <?php if ($data['menit_batas_presensi'] == '23') {
									echo "selected";
								}; ?> value="23">23</option>
						<option <?php if ($data['menit_batas_presensi'] == '24') {
									echo "selected";
								}; ?> value="24">24</option>
						<option <?php if ($data['menit_batas_presensi'] == '25') {
									echo "selected";
								}; ?> value="25">25</option>
						<option <?php if ($data['menit_batas_presensi'] == '26') {
									echo "selected";
								}; ?> value="26">26</option>
						<option <?php if ($data['menit_batas_presensi'] == '27') {
									echo "selected";
								}; ?> value="27">27</option>
						<option <?php if ($data['menit_batas_presensi'] == '28') {
									echo "selected";
								}; ?> value="28">28</option>
						<option <?php if ($data['menit_batas_presensi'] == '29') {
									echo "selected";
								}; ?> value="29">29</option>
						<option <?php if ($data['menit_batas_presensi'] == '30') {
									echo "selected";
								}; ?> value="30">30</option>
						<option <?php if ($data['menit_batas_presensi'] == '31') {
									echo "selected";
								}; ?> value="31">31</option>
						<option <?php if ($data['menit_batas_presensi'] == '32') {
									echo "selected";
								}; ?> value="32">32</option>
						<option <?php if ($data['menit_batas_presensi'] == '33') {
									echo "selected";
								}; ?> value="33">33</option>
						<option <?php if ($data['menit_batas_presensi'] == '34') {
									echo "selected";
								}; ?> value="34">34</option>
						<option <?php if ($data['menit_batas_presensi'] == '35') {
									echo "selected";
								}; ?> value="35">35</option>
						<option <?php if ($data['menit_batas_presensi'] == '36') {
									echo "selected";
								}; ?> value="36">36</option>
						<option <?php if ($data['menit_batas_presensi'] == '37') {
									echo "selected";
								}; ?> value="37">37</option>
						<option <?php if ($data['menit_batas_presensi'] == '38') {
									echo "selected";
								}; ?> value="38">38</option>
						<option <?php if ($data['menit_batas_presensi'] == '39') {
									echo "selected";
								}; ?> value="39">39</option>
						<option <?php if ($data['menit_batas_presensi'] == '40') {
									echo "selected";
								}; ?> value="40">40</option>
						<option <?php if ($data['menit_batas_presensi'] == '41') {
									echo "selected";
								}; ?> value="41">41</option>
						<option <?php if ($data['menit_batas_presensi'] == '42') {
									echo "selected";
								}; ?> value="42">42</option>
						<option <?php if ($data['menit_batas_presensi'] == '43') {
									echo "selected";
								}; ?> value="43">43</option>
						<option <?php if ($data['menit_batas_presensi'] == '44') {
									echo "selected";
								}; ?> value="44">44</option>
						<option <?php if ($data['menit_batas_presensi'] == '45') {
									echo "selected";
								}; ?> value="45">45</option>
						<option <?php if ($data['menit_batas_presensi'] == '46') {
									echo "selected";
								}; ?> value="46">46</option>
						<option <?php if ($data['menit_batas_presensi'] == '47') {
									echo "selected";
								}; ?> value="47">47</option>
						<option <?php if ($data['menit_batas_presensi'] == '48') {
									echo "selected";
								}; ?> value="48">48</option>
						<option <?php if ($data['menit_batas_presensi'] == '49') {
									echo "selected";
								}; ?> value="49">49</option>
						<option <?php if ($data['menit_batas_presensi'] == '50') {
									echo "selected";
								}; ?> value="50">50</option>
						<option <?php if ($data['menit_batas_presensi'] == '51') {
									echo "selected";
								}; ?> value="51">51</option>
						<option <?php if ($data['menit_batas_presensi'] == '52') {
									echo "selected";
								}; ?> value="52">52</option>
						<option <?php if ($data['menit_batas_presensi'] == '53') {
									echo "selected";
								}; ?> value="53">53</option>
						<option <?php if ($data['menit_batas_presensi'] == '54') {
									echo "selected";
								}; ?> value="54">54</option>
						<option <?php if ($data['menit_batas_presensi'] == '55') {
									echo "selected";
								}; ?> value="55">55</option>
						<option <?php if ($data['menit_batas_presensi'] == '56') {
									echo "selected";
								}; ?> value="56">56</option>
						<option <?php if ($data['menit_batas_presensi'] == '57') {
									echo "selected";
								}; ?> value="57">57</option>
						<option <?php if ($data['menit_batas_presensi'] == '58') {
									echo "selected";
								}; ?> value="58">58</option>
						<option <?php if ($data['menit_batas_presensi'] == '59') {
									echo "selected";
								}; ?> value="59">59</option>

					</select>
				</td>
			</tr>
			<tr>
			<tr>
				<td colspan="4"><br>
					<center><input type="submit" name="kirim" value="SIMPAN" class="blue1-button">&nbsp <a href="administrator.php?type=setting" class="red-button">BATAL</a></CENTER>
				<td>
		</table>
	</form>
</div>
<?php
$jam = $_POST['jam_presensi'];
$menit = $_POST['menit_presensi'];
$tjam = $_POST['telat_jam_presensi'];
$tmenit = $_POST['telat_menit_presensi'];
$bjam = $_POST['jam_batas_presensi'];
$bmenit = $_POST['menit_batas_presensi'];
$kirim = $_POST['kirim'];
if ($kirim) {
	$update = mysqli_query($database, "update setting  set jam_presensi ='" . $jam . "', 	menit_presensi='" . $menit . "', telat_menit_presensi='" . $tmenit . "', telat_jam_presensi='" . $tjam . "', jam_batas_presensi='" . $bjam . "', menit_batas_presensi='" . $bmenit . "' where no='1'");
	if ($update) {
		echo "	<script>
									window.location.href = 'administrator.php?type=setting';
				</script>";
	}
}
?>