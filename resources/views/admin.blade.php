<style>
  h2{
    text-align:center;
  }

  .admin__container{
    width:90%;
    margin-top:30px;
  }

  .contact_ttl{
    text-align:center;  
  }

  .admin__table{
    text-align:center;
    width:80%;
    margin:0 auto;
    border:1px solid black;
    border-radius:5px;
  }

  table{
    text-align:left;
  }

  
  th {
      color: black;
      width:15%;
      padding: 5px 20px;
    }

  td {
      padding: 25px 10px;
      width:60%;
  }
  .admin__btn{
    margin:0 31%;
  }

  button {
      padding: 10px 30px;
      background-color: black;
      border: none;
      border-radius: 5px;
      color: white;
  }
  .reset{
    margin-left:5%;
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
    <title>管理システム</title>

</head>
<body>

@if (count($errors) > 0)
<ul>
  @foreach ($errors->all() as $error)
  <li>
    {{$error}}
  </li>
  @endforeach
</ul>
@endif
<div class="admin__container">
  <div class="contact_ttl">
    <h2>管理システム</h2>
  </div>
  <div class="admin__table">
    <form action="/search" method="post">
      @csrf
      <table>
        <div class="flex-item">
          <tr>
            <th>
              お名前
            </th>
            <td>
              <input type="text" name="fullname">     
            </td>
          </tr>
          <tr>
            <th>
              性別 
            </th>
            <td>
            	<input type="radio" name="gender" value="1||2"  checked>全て
          		<input type="radio" name="gender" value="1">男性
    		      <input type="radio" name="gender" value="2">女性
            </td>
          </tr>
        <div>  
        <tr>
          <th>
            登録日
          </th>
          <td>
            <input type="timestamp" name="date"> ~ <input type="timestamp" name="date"><br>
          </td>
        </tr>
        <tr>
          <th>
            メールアドレス
          </th>
          <td>
            <input type="string" name="email"><br>
          </td>
        </tr>
        <tr>
          <th></th>
          <td>
            <div class="admin__btn">
              <button type="submit">検索</button><br>
              <a href="#" class="reset">リセット</a>
            </div> 
          </td>
        </table>
      </form>
    </div> 
  </div> 
  <div class="result__table">
    <table>
      <tr>
        <div class="result__th">
          <th>ID</th>
          <th>お名前</th>
          <th>性別</th>
          <th>メールアドレス</th>
          <th>ご意見</th>
          <th></th>
        </div>
      </tr>
      <ul>  
        @if(@isset($contacts))
          <div class="result__td">
            @foreach($contacts as $contact)
              <td>
                {{$contacts-id}}          
              </td>      
              <td>
                {{$contacts-fullname}}
              </td>      
              <td>
                {{$contacts-gender}}  
              </td>      
              <td>
                {{$contacts-email}}
              </td>      
              <td>
                {{$contacts-opinion}}  
              </td>      
              <td>
                <button>削除</button>
              </td>
            @endforeach
          </div>
        @endif  
      </ul>
    </table>  
  </div>   
</body>
</html>

