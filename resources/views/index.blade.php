<style>
  h3{
    text-align:center;
  }

  .container{
    width:90%;
    margin-top:30px;
  }

  .contact_ttl{
    text-align:center;  
  }

  .contact_table{
    text-align:center;
    margin:0 auto 0 20%;
  }

  table{
    text-align:left;
  }

  
  th {
    color: black;
    width:20%;
    padding: 10px 20px 0 0;
    font-size:12px;
    vertical-align:top;
  }

  td {
    padding: 10px 0px;
    width:60%;
    height:30px;
    color:rgb(204,204,204);
    font-size:13px;
    line-height: 200%;
  }

  .fullname{
    width:100%;
  }

  .lastname, .firstname{
    width:47%;
    float:left;
  }

  .gender__font{
    color:black;
  }

  .contact-red{
    color:red;
  }

  input[type= "char"]{
    width: 85%;
    height: 35px;
    border: 1px solid rgb(204,204,204);
    border-radius:5px;
  }
  
  label {
    position: relative;
    cursor: pointer;
    padding:0 30px;
  }

  label::before,
  label::after {
    content: "";
    display: block; 
    border-radius: 50%;
    position: absolute;
    transform: translateY(-50%);
    top: 50%;
  }

  label::before {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 50%;
    width: 25px;
    height: 25px;
    left: 5px;
  }

  label::after {
    background-color: black;
    border-radius: 50%;
    opacity: 0;
    width: 8px;
    height: 8px;
    left: 14px
  }

  input:checked + label::after {
    opacity: 1;
  }

  .visually-hidden{
  position: absolute;
  white-space: nowrap;
  width: 1px;
  height: 1px;
  overflow: hidden;
  border: 0;
  padding: 0;
  clip: rect(0 0 0 0);
  clip-path: inset(50%); 
  margin: -1px;
}

  input[type="string"] {
    width: 90%;
    height: 35px;
    border: 1px solid rgb(204,204,204);
    border-radius:5px;
  }

  input[type="textarea"]{
    width: 90%;
    height: 80px;
    border: 1px solid rgb(204,204,204);
    border-radius:5px;
  }

  .submit__btn{
    margin:20px 25% 0 auto;
  }

  button{
    padding: 10px 40px;
    background-color: black;
    border: none;
    color: white;
    cursor: pointer;
    border-radius:5px;
}



</style>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ</title>

</head>
<div class="container">
  <div class="contact_ttl">
    <h3>お問い合わせ</h3>
  </div>
  <div class="contact_table">
    <form method="POST" action="/confirm">
      <table>
      @csrf
      <tr>
        <th>
          お名前 <span class="contact-red">*</span>
        </th>
        <td>
          <div class="fullname"></div>
            <div class="lastname">
              <input name="lastname" value="{{ old('lastname') }}" type="string"><br>例) 山田
              @if ($errors->has('lastname'))
                <p class="error-message">{{ $errors->first('lastname') }}</p>
              @endif<br>
            </div>
            <div class="firstname">  
              <input name="firstname" value="{{ old('firstname') }}" type="string"><br>例) 太郎 
                @if ($errors->has('firstname'))
                  <p class="error-message">{{ $errors->first('firstname') }}</p>
                @endif<br>
            </div>  
          </div>  
        </td>
      </tr>
      <tr>
        <th>
          性別 <span class="contact-red">*</span>
        </th>
        <td>
          <div class="gender__font" >
            <input type="radio" class="visually-hidden" name="gender" id="men" value="1"  checked>
            <label for="men">&emsp;男性</label>
            <input type="radio" class="visually-hidden" name="gender" id="women" value="2" >
            <label for="women">&emsp;女性</label>
              @if ($errors->has('gender'))
                <p class="error-message">{{ $errors->first('gender') }}</p>
              @endif       
          </div>
        </td>
      </tr>
      <tr>
        <th>
          メールアドレス <span class="contact-red">*</span>
        </th>
        <td>
          <input name="email" value="{{ old('email') }}" type="string">
            @if ($errors->has('email'))
              <p class="error-message">{{ $errors->first('email') }}</p>
            @endif<br>
          &emsp;例) test@example.com
        </td>
      </tr>
      <tr>
        <th>
          郵便番号 <span class="contact-red">*</span>
        </th>
        <td>
          <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
          <form class="h-adr">
            <span class="p-country-name" style="display:none;">Japan</span>
              〒 <input name="postcode" class="p-postal-code" value="{{ old('postcode') }}"  type="char" size="8" maxlength="8">            
              @if ($errors->has('postcode'))
                <p class="error-message">{{ $errors->first('postcode') }}</p>
              @endif<br>
              &emsp;例)123-4567
        </td>
      </tr>
      <tr>
        <th>
          住所 <span class="contact-red">*</span>
        </th>
        <td>
          <input name="address" class="p-region p-locality p-street-address p-extended-address" value="{{ old('address') }}" type="string">
            @if ($errors->has('address'))
              <p class="error-message">{{ $errors->first('address') }}</p>
            @endif<br>
          &emsp;例)東京都渋谷区千駄ヶ谷1-2-3
          </form>
        </td>
      </tr>
      <tr>
        <th>
          建物名
        </th>
        <td>
              <input name="building_name" value="{{ old('building_name') }}" type="string">
          @if ($errors->has('building_name'))
            <p class="error-message">{{ $errors->first('building_name') }}</p>
          @endif<br>
            &emsp;例)千駄ヶ谷マンション101
        </td>
      </tr>
      <tr>
        <th>
          ご意見 <span class="contact-red">*</span>
        </th>
        <td>
          <input type=textarea name="opinion" value="{{ old('opinion') }}" minlength="1" maxlength="120">
            @if ($errors->has('opinion'))
              <p class="error-message">{{ $errors->first('opinion') }}</p>
            @endif
        </td>
      </tr>
    </table>
    <div class="submit__btn">
      <button type="submit">確認</button>
    </div>
  </form>
</div>    

