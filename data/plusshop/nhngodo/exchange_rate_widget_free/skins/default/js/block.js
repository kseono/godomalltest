var exchangeRateBlockVar = (function () {
  var exchange_rate = null;
  var prefix = 'pa_nhngodo_plusshop_exchange_rate_widget_free_';
  var exchange_rate_widget_free_input_txt_color;

  function init(init_data) {
    var _id = ''+init_data['id'];
    exchange_rate = init_data['data'];
    __render_widget(init_data, _id);

    var base_opt = $(_id).find('.'+prefix+'ps_ex_base_cur_type');
    var selectedVal = $(_id).find('.'+prefix+'ps_ex_base_cur_type option:selected').val();

    var splitWord = selectedVal.split(' ');
    var sym = splitWord.pop();
    var cur = splitWord.pop();
    base_opt.prev().find('span').text(splitWord.join(' '));
    base_opt.prev().find('.'+prefix+'cur').text(cur);
    base_opt.prev().find('.'+prefix+'sym').text(sym);

    var cur_opt = $(_id).find('.'+prefix+'ps_ex_exchange_cur_type');

    selectedVal = $(_id).find('.'+prefix+'ps_ex_exchange_cur_type option:selected').val();
    splitWord = selectedVal.split(' ');
    sym = splitWord.pop();
    cur = splitWord.pop();
    cur_opt.prev().find('span').text(splitWord.join(' '));
    cur_opt.prev().find('.'+prefix+'cur').text(cur);
    cur_opt.prev().find('.'+prefix+'sym').text(sym);

    __calculate_timer(_id);
  }

  function bind(_id) {

    $(_id).find('.'+prefix+'btn').on({
      'click':function(){
        var btnHeight = $(_id).find('.'+prefix+'btn').innerHeight();
        var lyWidth =  $(_id).find('.'+prefix+'layer').innerWidth();
        var btnLeft = $(_id).find('.'+prefix+'btn').offset().left;

        if (btnLeft > lyWidth) {
          $(_id).find('.' + prefix + 'layer').css('top', btnHeight + 10);
        } else {
          $(_id).find('.' + prefix + 'layer').css({
            top: btnHeight + 10,
            left: 0
          });
        }

        if ($(_id).find('.'+prefix+'layer').css('display') == 'none') {
          $(_id).find('.'+prefix+'layer').show();
        } else {
          $(_id).find('.'+prefix+'layer').hide();
        }
      }
    });

    $(_id).find('.'+prefix+'layer_close').on({
      'click':function(){
        $(_id).find('.'+prefix+'layer').hide();
      }
    });

    $(_id).find('.'+prefix+'exh_input').on({
      'keyup':function(){
        var thisObject = $(this);
        var str = thisObject.val();

        if(!str){
          $(_id).find('.'+prefix+'btn_del').removeClass(prefix+'on');
        }else{
          $(_id).find('.'+prefix+'btn_del').addClass(prefix+'on');
        }
      }
    });

    $(_id).find('.'+prefix+'btn_del').on({
      'click':function(){
        $(_id).find('.'+prefix+'exh_input').val('');
        $(_id).find('.'+prefix+'exh_input').focus();
        __calculate_timer(_id);
        $(this).removeClass(prefix+'on');
      }
    });

    $(_id).find('.'+prefix+'select_opt select').on({
      'change':function(){
        var selectedVal = $(this).val();
        var splitWord = selectedVal.split(' ');
        var sym = splitWord.pop();
        var cur = splitWord.pop();
        $(this).prev().find('span').text(splitWord.join(' '));
        $(this).prev().find('.'+prefix+'cur').text(cur);
        $(this).prev().find('.'+prefix+'sym').text(sym);
      }
    });

    $(_id).find('.'+prefix+'ps_ex_widget_cost').on('keyup', function (e) {
      __calculate_timer(_id);
    });

    $(_id).find('.'+prefix+'ps_ex_widget_cost').on('blur', function () {
      this.value = (Number(this.value.replace(/[^0-9\.-]+/g,"")).formatMoney());
    });

    $(_id).find('.'+prefix+'ps_ex_base_cur_type').on('change', function (e) {
      __calculate_timer(_id);
    });

    $(_id).find('.'+prefix+'ps_ex_exchange_cur_type').on('change', function (e) {
      __calculate_timer(_id);
    })

  }

  function __calculate_timer(_id){

    var base_currency = $(_id).find('.'+prefix+'ps_ex_base_cur_type option:checked').attr('data-value');
    var exchange_currency = $(_id).find('.'+prefix+'ps_ex_exchange_cur_type option:checked').attr('data-value');

    __cal_exchange_rate(base_currency, exchange_currency, _id);

  }

  function __cal_exchange_rate(base_currency, exchange_currency, _id){
    var trans_cost = 0;
    var exCost = $(_id).find('.'+prefix+'ps_ex_widget_cost');
    var exChange = $(_id).find('.'+prefix+'exchange_currency');
    var cost = Number(exCost.val().replace(/[^0-9\.-]+/g,""));

    if (!cost) {
      cost = 1;
      exchange_rate_widget_free_input_txt_color = exChange.css('color');
      exChange.css('color', 'lightgray');
    } else if (exChange.css('color') === 'rgb(211, 211, 211)') {
      exChange.css('color', exchange_rate_widget_free_input_txt_color);
    }

    var base_cur_rate = Number(exchange_rate[base_currency].replace(/[^0-9\.-]+/g,""));
    var exchange_cur_rate = Number(exchange_rate[exchange_currency].replace(/[^0-9\.-]+/g,""));

    if (base_currency !== 'KRW' && exchange_currency === 'KRW') {
      trans_cost = cost * base_cur_rate;
    } else if(base_currency === 'KRW'){
      trans_cost = cost / exchange_cur_rate;
    } else if(base_currency !== 'KRW' && exchange_currency !== 'KRW') {
      trans_cost = cost * (base_cur_rate / exchange_cur_rate);
    }
    if (isNaN(trans_cost)) {
      trans_cost = 0.00;
    }

    exChange.val(trans_cost.formatMoney());
  }

  function __render_widget(data, _id){
    _id = data['id'];
    if (data.setting.widget_type === 'icon_type') {
      if (data.setting.widget_icon_type === 'self_icon') {
        $(_id).find('.ps_ex_widget_icon').show();
      } else {
        $(_id).find('.'+prefix+'btn').show()
      }
    } else {
      $(_id).addClass(prefix+'type2');
    }
  }

  Number.prototype.formatMoney = function formatMoney () {
    var amount = this.toFixed(2);
    return amount.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
  };

  return {
    bind : bind,
    init : init
  };
})();
