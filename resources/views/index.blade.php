<style>
  h2{
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
    margin:0 auto 0 25%;
  }

  table{
    text-align:left;
  }

  
  th {
      color: black;
      width:15%;
      padding: 5px 20px;
      font-size:12px;

    }

  td {
      padding: 25px 0px;
      width:60%;
      color:rgb(204,204,204);
      font-size:14px;
      line-height: 150%;
  }

  .gender__font{
    color:black;
  }

  .contact-red{
    color:red;
  }

  input[type= "char"]{
    width: 85%;
    height: 30px;
    border: 1px solid rgb(204,204,204);
    border-radius:5px;

  }

  input[type="string"] {
    width: 90%;
    height: 30px;
    border: 1px solid rgb(204,204,204);
    border-radius:5px;
  }

    input[type="textarea"]{
    width: 90%;
    height: 80px;
    border: 1px solid rgb(204,204,204);
    border-radius:5px;
  }

  button, .confirm__btn{
      padding: 10px 20px;
      background-color: black;
      border: none;
      color: white;
      cursor: pointer;
      border-radius:5px;
      margin:0 15%;
  }

  .flex-item{
    display:flex;
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
@if (count($errors) > 0)
<ul>
  @foreach ($errors->all() as $error)
  <li>
    {{$error}}
  </li>
  @endforeach
</ul>
@endif
<div class="container">
  <div class="contact_ttl">
    <h2>お問い合わせ</h2>
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
            <input name="fullname" value="{{ old('fullname') }}" type="string">
              @if ($errors->has('fullname'))
                <p class="error-message">{{ $errors->first('fullname') }}</p>
              @endif<br>
                例) 山田　太郎 
          </div>  
        </td>
      </tr>
      <tr>
        <th>
          性別 <span class="contact-red">*</span>
        </th>
        <td>
          <div class="gender__font">
            <input type="radio" name="gender" value="1"  checked>男性
            <input type="radio" name="gender" value="2" >女性    
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
          例) test@example.com
        </td>
      </tr>
      <tr>
        <th>
          郵便番号 <span class="contact-red">*</span>
        </th>
        <td>
          〒 <input name="postcode" value="{{ old('postcode') }}" type="char">
            @if ($errors->has('postcode'))
              <p class="error-message">{{ $errors->first('postcode') }}</p>
            @endif<br>
            例)123-4567
        </td>
      </tr>
      <tr>
        <th>
          住所 <span class="contact-red">*</span>
        </th>
        <td>
          <input name="address" value="{{ old('address') }}" type="string">
            @if ($errors->has('address'))
              <p class="error-message">{{ $errors->first('address') }}</p>
            @endif<br>
          例)東京都渋谷区千駄ヶ谷1-2-3
        </td>
      </tr>
      <tr>
        <th>
          建物名
        </th>
        <td>
              <input
        name="building_name" value="{{ old('building_name') }}" type="string">
          @if ($errors->has('building_name'))
            <p class="error-message">{{ $errors->first('building_name') }}</p>
          @endif<br>
            例)千駄ヶ谷マンション101
        </td>
      </tr>
      <tr>
        <th>
          ご意見 <span class="contact-red">*</span>
        </th>
        <td>
          <input type=textarea name="opinion" value="{{ old('opinion') }}">
            @if ($errors->has('opinion'))
              <p class="error-message">{{ $errors->first('opinion') }}</p>
            @endif
        </td>
      </tr>
      <tr>
        <th></th>
        <td>
          <button type="submit">確認</button>
        </td>
    </table>
  </form>
</div>    

