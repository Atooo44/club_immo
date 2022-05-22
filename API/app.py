import json
from wsgiref.handlers import BaseCGIHandler
from flask import Flask, jsonify, request, Response
from retriever import logic_immo
from database import find_announce_list, add_announce_to_db

app = Flask(__name__)

@app.route('/addAnnounces')
def addProducts():
    try:
        res = logic_immo()
        for announce in res:
            add_announce_to_db(announce)
        return jsonify({
            "isSuccess": True
        })
    except BaseException as err:
        return jsonify({
            "isSuccess": False,
            "status": err
        })

@app.route('/getAnnounces')
def getProducts():
    products = find_announce_list()
    response = jsonify({'announces': products})
    response.headers.add('Access-Control-Allow-Origin', '*')
    return response