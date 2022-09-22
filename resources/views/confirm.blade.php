<style>
  h3{
    text-align:center;
  }

  .container{
    width:90%;
    margin-top:30px;
  }

  .contact__ttl{
    text-align:center;  
  }

  .contact__table{
    text-align:center;
    margin:0 auto 0 20%;
  }

  table{
    text-align:left;
    font-size:14px;
    margin:0 auto 0 0;
  }


  
  th {
      color: black;
      width:20%;
      padding: 5px 20px;
    }

  td {
      padding: 25px 10px;
      width:60%;
  }
  button {
      padding: 10px 20px;
      background-color: black;
      border: none;
      color: white;
      border-radius:5px;
      cursor: pointer;
  }
  .confirm__btn{
    margin:20px 25% 0 auto;
  }

  .back-btn{
    background:none;
    border:none;
    color:blue;
    text-decoration:underline;
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
<body>

<div class="container">
  <div class="contact__ttl">
    <h3>お問い合わせ</h3>
  </div>
  <div class="contact__table">
    <form method="POST" action="/add">
      @csrf
      <table>
        <ul>
        <tr>
          <th>
            お名前
          </th>
          <td>
            <div class="fullname"></div>
              {{ $inputs['lastname'] }}{{ $inputs['firstname'] }}
                <input name="fullname" value="{{ $inputs['lastname'] }}{{ $inputs['firstname'] }}" type="hidden">
            </div>  
          </td>
        </tr>
        <tr>
          <th>
            性別
          </th>
          <td>
            <input name="gender" value="{{ $inputs['gender'] }}" type="hidden">
            @if ($inputs['gender']==='1')
              男性
            @else  
              女性
            @endif
          </td>
        </tr>
        <tr>
          <th>
            メールアドレス
          </th>
          <td>
            {{ $inputs['email'] }}
            <input name="email" value="{{ $inputs['email'] }}" type="hidden">
          </td>
        </tr>
        <tr>
          <th>
            郵便番号
          </th>
          <td>
            〒  {{ $inputs['postcode'] }}
            <input name="postcode" value="{{ $inputs['postcode'] }}" type="hidden">
          </td>
        </tr>
        <tr>
          <th>
            住所
          </th>
          <td>
            {{ $inputs['address'] }}
            <input name="address" value="{{ $inputs['address'] }}" type="hidden">
          </td>
        </tr>
        <tr>
          <th>
            建物名
          </th>
          <td>
            {{ $inputs['building_name'] }}
            <input name="building_name" value="{{ $inputs['building_name'] }}" type="hidden">
          </td>
        </tr>
        <tr>
          <th>
            ご意見
          </th>
          <td>
            {!! nl2br(e($inputs['opinion'])) !!}
            <input name="opinion" value="{{ $inputs['opinion'] }}" type="hidden">
          </td>
        </tr>
      </ul>
      </table>
      <div class="confirm__btn">  
        <button type="submit" name="action" value="submit">送信</button><br>
        <button type="submit" name="action" value="back" class="back-btn" >修正する</button><br>
      </div>    
    </form>
  </div>  
</body>
</html>
