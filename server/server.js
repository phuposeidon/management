const express = require('express');
var app = express();
const http = require('http').Server(app);
const io = require('socket.io')(http);
const mysql = require('mysql');
const Promise = require('bluebird');

var connection = mysql.createPool({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'phongkham'
});

function getAll() {
    return new Promise(function (resolve, reject) {
        connection.query('Select * from sinhvien', function (err, rows) {
            if (err) {
                return reject(err);
            } else {
                return resolve(rows);
            }
        });
    })
}

function create() {
    body = ['Kyle', 'Toán'];
    return new Promise(function (resolve, reject) {
        connection.query('Insert into sinhvien(name,class) value(?,?)', body, function (err, rows) {
            if (err) {
                return reject(err);
            } else {
                return resolve(rows);
            }
        });
    })
}

io.on('connection', function (socket) {
    console.log('user connected');
    // Answer
    socket.on('answer', function (answer) {
        console.log(answer);
        io.sockets.emit('answerSuccess', answer);
    });
    //end

    //Like
    socket.on('like',function(count){
        console.log(count);
        io.sockets.emit('likeSuccess',count);
    });
    //notification
    socket.on('notification',function(notification){
        io.sockets.emit('notifi_success',notification);
        console.log(notification);
    });
    //Appointment
    socket.on('appointment',function(msg){
        io.sockets.emit('response_hour',msg);
    });
    socket.on('disconnect', function () {
        console.log('user is disconnected');
    });


});

http.listen(3001, function () {
    console.log("Server listen at port 3001");
});