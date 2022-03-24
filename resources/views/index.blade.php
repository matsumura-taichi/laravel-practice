<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
</head>

<body>
  <p>{{$txt}}</p>
  @if (count($errors) > 0)
    <p>入力に問題があります</p>
  @endif
  <form action="/" method="POST">
    <table>
      @csrf
      @if ($errors->has('name'))
        <tr>
          <th>ERROR</th>
          <td>
            {{$errors->first('name')}}
          </td>
        </tr>
      @endif
      <tr>
        <th>名前</th>
        <td>
          <input type="text" name="name">
        </td>
      </tr>
      @if ($errors->has('role'))
        <tr>
          <th>ERROR</th>
          <td>
            {{$errors->first('role')}}
          </td>
        </tr>
      @endif      
      <tr>
        <th>役職</th>
        <td>
          <input type="text" name="role">
        </td>
      </tr>
      @if ($errors->has('email'))
        <tr>
          <th>ERROR</th>
          <td>
            {{$errors->first('email')}}
          </td>
        </tr>
      @endif
      <tr>
        <th>メール</th>
        <td>
          <input type="email" name="email">
        </td>
      </tr>
      @if ($errors->has('age'))
        <tr>
          <th>ERROR</th>
          <td>
            {{$errors->first('age')}}
          </td>
        </tr>
      @endif
      <tr>
        <th>年齢</th>
        <td>
          <input type="text" name="age">
        </td>
      </tr>
      @if ($errors->has('registered_at'))
        <tr>
          <th>ERROR</th>
          <td>
            {{$errors->first('registered_at')}}
          </td>
        </tr>
      @endif
      <tr>
        <th>登録日</th>
        <td>
          <input type="text" name="registered_at">
        </td>
      </tr>
    </table>
    <input type="submit" value="送信">
  </form>
</body>
</html>
