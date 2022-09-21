<style>
  h3{
    text-align:center;
  }

  .admin__container{
    width:90%;
    margin-left:5%;
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

  
  .search-th {
      color: black;
      width:20%;
      padding: 5px 20px;
    }

  .search-td {
      padding: 15px 10px;
      width:70%;
  }

  .gender__ttl{
    margin-left:10px;
    font-weight:bold;
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

  .admin__btn{
    width:150px;
    text-align:center;
    margin:0 40% 0 auto;
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
    background:none;
    border:none;
    color:blue;
    cursor: pointer;
  }
  
  .result__table{
    width:100%;
    margin:5% auto auto 5%;
    justify-content:space-between;
  }
  .result__th{
    justify-content:space-between;
  }

  .result__td{
    justify-content:space-between;
  }

  .td-id{
    width:5%;
    margin:0 5% 0 15%;
  }
  .td-fullname{
    width:15%;
    margin:0 5%;
  }
  .td-gender{
    width:5%;
    margin:0 5%;
  }
  .td-email{
    width:15%;
    margin:0 5%;
  }
  .td-opinion{
  width:25%;
  margin:0 15% 0 5% ;
  }
  
  .short{
    width:320px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .td-button{
    width:50px;
    writing-mode:vertical-lr;
    font:12px;
    margin:0 5%;
  }


  .delete__btn{
      padding: 3px 20px;
      background-color: black;
      border: none;
      border-radius: 5px;
      color: white;
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
            <th class="search-th" >
              お名前
            </th>
            <td class="search-td">
              <input type="string" name="fullname">               
              <span class="gender__ttl">性別</span> 
            	<input type="radio" name="gender" value="0"  checked>全て
          		<input type="radio" name="gender" value="1">男性
    		      <input type="radio" name="gender" value="2">女性
            </td>
          </tr>
        <div>  
        <tr>
          <th class="search-th">
            登録日
          </th>
          <td class="search-td">
            <input type="date" name="from">&emsp;~&emsp;<input type="date" name="until"><br>
          </td>
        </tr>
        <tr>
          <th class="search-th">
            メールアドレス
          </th>
          <td class="search-td">
            <input type="string" name="email"><br>
          </td>
        </tr>
      </table>
    <div class="admin__btn">
      <input type="submit" class="search__btn" value="検索"><br> 
    </form>
      <form action="/admin" method="get">
        <button type="submit" class="reset__btn" >リセット</button>
      </form>
    </div>    
  </div> 
</div> 

  <div class="result__table">
    <table>
      @if(@isset($contacts))
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
          <div class="result__td">
            @foreach($contacts as $contact)
              <tr>
                <td class="td-id">
                  {{$contact->id}}
                </td>      
                <td class="td-fullname">
                  {{$contact->fullname}}
                </td>      
                <td class="td-gender">
                  @if($contact->gender ==1)
                    男性
                  @else
                    女性
                  @endif
                </td>      
                <td class="td-email">
                  {{$contact->email}}
                </td>      
                <td class="td-opinion">
                  <p class="short">{{$contact->opinion}}<p>
                </td>      
                <form action="/delete" method="post">
                  @csrf
                    <td class="td-btn">
                        <input type="hidden" name="id" value="{{$contact->id}}">
                          <button class="delete__btn" type="submit">削除</button>
                    </td>
                </form>
              </tr>  
            @endforeach
          </div>
        </ul>
      @endif  
    </table>  
  </div>   
</body>
</html>

