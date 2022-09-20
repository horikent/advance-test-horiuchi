<style>
  h3{
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
    width:90%;
    margin:0 auto;
    border:1px solid black;
  }

  table{
    text-align:left;
    color:black;
    font-size:12px;
  }

  
  th {
      color: black;
      width:20%;
      padding: 5px 20px;
    }

  td {
      padding: 15px 10px;
      width:70%;
  }

  .gender__ttl{
    margin-left:10px;
    font-weight:bold;
  }
  .admin__btn{
    width:150px;
    text-align:center;
    margin:0 40% 0 auto;
  }

  input[type="string"]{
    height: 35px;
    border: 1px solid rgb(204,204,204);
    border-radius:5px;
  }

    input[type="date"]{
    height: 35px;
    border: 1px solid rgb(204,204,204);
    border-radius:5px;
  }

  .result__table{
    width:95%;
    justify-content:space-between;
    margin:5% auto auto 5%;
  }


  .search__btn {
      padding: 10px 30%;
      background-color: black;
      border: none;
      border-radius: 5px;
      color: white;
      cursor: pointer;
  }

  .reset__btn{
    margin-left:5%;
    background:none;
    border:none;
    color:blue;
    cursor: pointer;
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
    <h3>管理システム</h3>
  </div>
  <div class="admin__table">
    <form action="/admin" method="post">
      @csrf
      <table>
        <div class="flex-item">
          <tr>
            <th>
              お名前
            </th>
            <td>
              <input type="string" name="fullname">               
              <span class="gender__ttl">性別</span> 
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
            <input type="date" name="from">&emsp;~&emsp;<input type="date" name="until"><br>
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
      </table>
      <div class="admin__btn">
        <input type="submit" class="search__btn" value="検索"><br>
          <form action="/reset" method="post">
            <input type="reset" class="reset__btn" value="リセット">
          </form>  
      </div> 
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
              <tr>
                <td>
                  {{$contact->id}}
                </td>      
                <td>
                  {{$contact->fullname}}
                </td>      
                <td>
                  {{$contact->gender}}
                </td>      
                <td>
                  {{$contact->email}}
                </td>      
                <td>
                  {{$contact->opinion}}
                </td>      
                <form action="/delete" method="post">
                  @csrf
                    <td>
                        <input type="hidden" name="id" value="{{$contact->id}}">
                          <button type="submit">削除</button>
                    </td>
                </form>
              </tr>  
            @endforeach
          </div>
        @endif  
      </ul>
    </table>  
  </div>   
</body>
</html>

