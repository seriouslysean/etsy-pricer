<?php
wp_enqueue_script(self::SLUG.'-scripts');
$_prefix = time().'_';
?>
<form id="<?php echo $_prefix ?>etsy_pricer" class="etsy-pricer" data-abide data-prefix="<?php echo $_prefix ?>">
  <section class="step step-1" data-step="1">
    <div class="row">
      <div class="large-12 columns">
        <h3>Product</h3>
      </div>
    </div>
    <div class="row">
      <div class="large-6 columns">
        <input type="text" id="<?php echo $_prefix ?>time_spent" name="time_spent" placeholder="HH:MM" required pattern="^[0-9][0-9]:[0-9][0-9]$" />
        <small class="error">The time entered MUST follow this format HH:MM. For 15 minutes, you would enter <strong>00:15</strong>.</small>
      </div>
      <div class="large-6 columns">
        <label form="<?php echo $_prefix ?>time_spent" class="inline">time spent making item</label>
      </div>
    </div>
    <div class="row">
      <div class="large-6 columns">
        <input type="text" id="<?php echo $_prefix ?>dollars_hour" name="dollars_hour" placeholder="15.00" required pattern="number" />
      </div>
      <div class="large-6 columns">
        <label form="<?php echo $_prefix ?>dollars_hour" class="inline">dollars you want to make per hour</label>
      </div>
    </div>
    <div class="row">
      <div class="large-6 columns">
        <input type="text" id="<?php echo $_prefix ?>materials_cost" name="materials_cost" placeholder="0.00" required pattern="number" />
      </div>
      <div class="large-6 columns">
        <label form="<?php echo $_prefix ?>materials_cost" class="inline">total cost of materials</label>
      </div>
    </div>
    <div class="row">
      <div class="large-6 columns">
        <input type="text" id="<?php echo $_prefix ?>expense_cost" name="expense_cost" placeholder="0.00" required pattern="number" />
      </div>
      <div class="large-6 columns">
        <label form="<?php echo $_prefix ?>expense_cost" class="inline">total cost of expenses</label>
      </div>
    </div>
    <div class="row">
      <div class="large-6 columns">
        <div class="range-slider round profit_margin" data-slider="15" data-options="display_selector:#<?php echo $_prefix ?>profit_margin_value;start:0;end:100;">
          <span class="range-slider-handle"></span>
          <span class="range-slider-active-segment"></span>
          <input type="hidden" id="<?php echo $_prefix ?>profit_margin_hidden" name="profit_margin_hidden" required />
        </div>
      </div>
      <div class="large-6 columns">
        <label form="<?php echo $_prefix ?>profit_margin_hidden" class="inline"><span id="<?php echo $_prefix ?>profit_margin_value"></span>% profit margin</label>
      </div>
    </div>
  </section>
  <section class="step step-2" data-step="2">
    <div class="row">
      <div class="large-12 columns">
        <h3>Fees</h3>
      </div>
    </div>
    <div class="row">
      <div class="large-6 columns">
        <input type="text" id="<?php echo $_prefix ?>shipping_fee" name="shipping_fee" placeholder="0.00" required pattern="number" />
      </div>
      <div class="large-6 columns">
        <label for="shipping_fee" class="inline">shipping fee</label>
      </div>
    </div>
    <div class="row">
      <div class="large-6 columns">
        <input type="text" id="<?php echo $_prefix ?>transaction_cost" name="transaction_cost" placeholder="0.30" required pattern="number" />
      </div>
      <div class="large-6 columns">
        <label for="transaction_cost" class="inline">transaction cost</label>
      </div>
    </div>
    <div class="row">
      <div class="large-6 columns">
        <input type="text" id="<?php echo $_prefix ?>transaction_fee" name="transaction_fee" placeholder="2.7" required pattern="number" />
      </div>
      <div class="large-6 columns">
        <label for="transaction_fee" class="inline">% transaction fee</label>
      </div>
    </div>
  </section>

  <section class="step step-3" data-step="3">
    <div class="row">
      <div class="small-12 columns">
        <button type="submit" id="<?php echo $_prefix ?>calculate" name="calculate" class="button success postfix">Calculate</button>
      </div>
    </div>
    <div class="row">
      <div class="large-12 columns">
        <h3>Bottom Line</h3>
      </div>
    </div>
    <div class="row">
      <div class="small-12 columns">
        <table class="text-left" width="100%">
          <tbody>
            <tr>
              <th width="50%">Wholesale</th>
              <td><strong class="cost wholesale" id="<?php echo $_prefix ?>cost_wholesale">$0.00</strong> <em>(<span class="cost wholesale" id="<?php echo $_prefix ?>cost_wholesale_shipping">$0.00</span> after shipping)</em></td>
            </tr>
            <tr>
              <th>Retail</th>
              <td><strong class="cost retail" id="<?php echo $_prefix ?>cost_retail">$0.00</strong> <em>(<span class="cost retail" id="<?php echo $_prefix ?>cost_retail_shipping">$0.00</span> after shipping)</em></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</form>