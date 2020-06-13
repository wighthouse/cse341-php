'use strict'

const fs = require('fs')
const path = require('path')

const folder = process.argv[2]
const ext = '.' + process.argv[3]

fs.readdir(folder, function(err, list) {
    if (err) {
        return console.error(err)
    }
    list.forEach(function(list) {
        if (path.extname(list) === ext) {
            console.log(list)
        }
    })
})