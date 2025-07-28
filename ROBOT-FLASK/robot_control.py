import datetime

class Robot:
    def __init__(self):
        self.direction = 'stop'
        self.battery = 87  # %
        self.temperature = 36.5  # °C

    def move(self, action):
        self.direction = action
        print(f"Le robot se déplace vers : {action}")

    def get_status(self):
        return {
            'direction': self.direction,
            'battery': f"{self.battery}%",
            'temperature': f"{self.temperature}°C",
            'last_updated': datetime.datetime.now().isoformat()
        }
