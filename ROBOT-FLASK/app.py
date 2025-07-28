from flask import Flask, request, jsonify
from robot_control import Robot
from flask_cors import CORS

app = Flask(__name__)
robot = Robot()
CORS(app)

@app.route('/api/command', methods=['POST'])
def control_robot():
    data = request.get_json()
    action = data.get('action')

    if action in ['forward', 'backward', 'left', 'right', 'stop']:
        robot.move(action)
        return jsonify({'message': f'Commande {action} envoyée.'}), 200
    else:
        return jsonify({'error': 'Commande inconnue'}), 400

@app.route('/api/status', methods=['GET'])
def status():
    return jsonify(robot.get_status())

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
