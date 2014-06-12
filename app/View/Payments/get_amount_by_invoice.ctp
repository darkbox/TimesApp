<label><?php echo __('Amount') . " " . $currency ?><small> Required</small>
<input data-abide-validator="maxThan" id="amountMax" type="number" step="any" min="0.01" max="<?php echo $amount ?>" name="data[Payment][amount]" placeholder="<?php echo $amount ?>" value="<?php echo $amount ?>" required>
</label>
<small class="error">Please, add an amount greater than 0.00 and lesser than or equal to <?php echo $amount ?>.</small>
