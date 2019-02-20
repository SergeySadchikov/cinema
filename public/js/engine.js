'use strict';

function browserJSEngine(block) {
        if (block === undefined || block === null || block === false) {
            return document.createTextNode('');
        }
        if (typeof block === 'string' || typeof block === 'number' || block === true) {
            return document.createTextNode(block);
        }
        if (Array.isArray(block)) {
            return block.reduce((f, el) => {
                f.appendChild(browserJSEngine(el));
 
                return f;
            }, document.createDocumentFragment())
        }
        const element = document.createElement(block.tag);
 
        element.classList.add(...[].concat(block.className || []));
 
        if (block.attr) {
            Object.keys(block.attr).forEach(key => {
                element.setAttribute(key, block.attr[key]);
            });
        }
 
        element.appendChild(browserJSEngine(block.content));
 
        return element;
    }