'use strict';

function actionTemplate(key, value) {
	return {
		tag: 'section',
		className: 'conf-step',
        attr: {id: key},
		content: {
			tag: 'header',
			className: ['conf-step__header','conf-step__header_closed'],
			content: { tag: 'h2', className: 'conf-step__title', content: value}
		}
	}
}
function availableHallsTemplate() {
	return {
        tag: 'div',
        className: 'conf-step__wrapper',
        content: [
        	{
				tag: 'p',
				className: 'conf-step__paragraph',
				content: 'Доступные залы:'
			},
			{
				tag: 'ul',
				className: 'conf-step__list',
				content: ''
    		}]

	}
}
function availibleHallTemplate(hall) {
    return {
        tag: 'li',
		className: '',
        content: [
        	hall.name,
			{
				tag: 'button',
				className: ['conf-step__button', 'conf-step__button-trash'],
				content: ''
			}
		]
    }
}