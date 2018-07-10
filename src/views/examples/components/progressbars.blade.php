    {!! AdminLTE::widget()->progressBar()->number(20)->style('info')->stripped()->render() !!}
    {!! AdminLTE::widget()->progressBar()->number(30)->style('danger')->render() !!}
    {!! AdminLTE::widget()->progressBar()->number(20)->style('warning')->stripped()->active()->render() !!}
    {!! AdminLTE::widget()->progressBar()->number(90)->size('sm')->style('success')->stripped()->text('Amount Of People')->showNumber()->active()->render() !!}