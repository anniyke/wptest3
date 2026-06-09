<div class="pxl-currency">
	<div class="currency-converter">
		<div class="start-value">
			<label><?php echo esc_html__('You send exactly','stotage') ?></label>
			<div>
				<input type="number" class="amount" value="10" />
				<select class="from-currency">
					<option value="USD">USD</option>
					<option value="EUR">EUR</option>
					<option value="VND">VND</option>
				</select>
			</div>
		</div>
		<div class="change-value">
			<label><?php echo esc_html__('Recipient gets','stotage') ?></label>
			<div>
				<input type="text" class="converted" disabled />
				<select class="to-currency">
					<option value="BDT">BDT</option>
					<option value="USD">USD</option>
					<option value="EUR">EUR</option>
					<option value="INR">INR</option>
					<option value="VND">VND</option>
				</select>
			</div>
		</div>
	</div>
</div>