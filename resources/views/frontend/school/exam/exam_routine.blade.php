<!DOCTYPE html>
<html>
<head>
    <title>Exam Routine Download</title>
    <style>
        table {
  border-spacing: 1;
  border-bottom: 1px solid black;
  border-collapse: collapse;
  background: white;
  border-radius: 6px;
  overflow: hidden;
  max-width: 90%;
  width: 100%;
  height: 50%;
  margin: 0 auto;
  position: relative;
}
table * {
  position: relative;
}
table td, table th {
  padding: 15px;
  /* text-align: center; */
  
}
table thead tr {
  height: 80px;
  background: #FFED86;
  text-align: center;
  font-size: 25px;
}
table tbody tr {
  height: 50px;
  font-size: 18px;
  text-align: center;
  border: 1px solid #070707;
}
table tbody td {
  /* height: 70px;
  font-size: 20px; */
  border: 1px solid #070707;
}
table tbody tr:last-child {
  border: 0;
}
table td, table th {
  text-align: left;
}
table td.l, table th.l {
  text-align: right;
}
table td.c, table th.c {
  text-align: center;
}
table td.r, table th.r {
  text-align: center;
}

@media screen and (max-width: 35.5em) {
  table {
    display: block;
  }
  table > *, table tr, table td, table th {
    display: block;
  }
  table thead {
    display: none;
  }
  table tbody tr {
    height: auto;
    padding: 8px 0;
  }
  table tbody tr td {
    padding-left: 45%;
    margin-bottom: 12px;
  }
  table tbody tr td:last-child {
    margin-bottom: 0;
  }
  table tbody tr td:before {
    position: absolute;
    font-weight: 700;
    width: 40%;
    left: 10px;
    top: 0;
  }
  table tbody tr td:nth-child(1):before {
    content: "Code";
  }
  table tbody tr td:nth-child(2):before {
    content: "Stock";
  }
  table tbody tr td:nth-child(3):before {
    content: "Cap";
  }
  table tbody tr td:nth-child(4):before {
    content: "Inch";
  }
  table tbody tr td:nth-child(5):before {
    content: "Box Type";
  }
}
body {
  background: white;
  font: 400 14px "Calibri", "Arial";
  padding: 20px;
}

blockquote {
  color: white;
  text-align: center;
}
    </style>
</head>
<body>
    <div style="text-align: center; line-height: 20px;">
      <h1 style="font-size: 30px;">{{ $school->school_name }}</h1>
      <h2 style="font-size: 35px;">{{ $term->term_name }} Routine</h2>
      <h1 style="font-size: 30px;">{{ $class->class_name }} - ({{$shift}})</h1>
    </div>
    <table>
        <thead>
          <tr>
            <th>Subject</th>
            <th>{{__('app.date')}}</th>
            <th>Day</th>
            <th>Time</th>
          </tr>
        <thead>
        <tbody>
          @foreach ($exam_routines as $exam_routine)
            <tr>
              <td>{{ $exam_routine->subject->subject_name }}</td>
              <td>{{ $exam_routine->date }}</td>
              <td>{{ $exam_routine->day }}</td>
              <td>{{ $exam_routine->start_time}} - {{ $exam_routine->end_time }}</td>
            </tr>
          @endforeach
        </tbody>
    </table>
    
</body>
</html>