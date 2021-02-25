$('#qty').on('input', (e) => {
    $('.qty-div').nextAll('div').remove()
    let question = 1;
    for(question; question <= $('#qty').val(); question++)
    {
        $('.card-body').append('<div class="form-group"><label class="text-primary" for="question['+question+']">Вопрос '+question+'</label><input id="question['+question+']" name="question['+question+']" type="text" class="form-control" placeholder="Введите вопрос"><div class="form-group my-2 answers-div-'+question.toString()+'"></div>');
        for(let i = 1; i <= 4; i++)
        {
            if(i == 1)
            {
                $('.answers-div-'+question.toString()).append('<div class="form-group"><label class="text-success" for="answer['+question+']['+i+']">Правильный ответ</label><input id="qtya" name="answer['+question+']['+i+']" type="text" class="form-control" placeholder="Введите ответ"></div>');
            } else {
                $('.answers-div-'+question.toString()).append('<div class="form-group"><label class="text-secondary" for="answer['+question+']['+i+']">Ответ</label><input id="qtya" name="answer['+question+']['+i+']" type="text" class="form-control" placeholder="Введите ответ"></input></div>');
            }

        }
    }
});