import requests

class Robot:
    def __init__(self):
        self.direction = "stop"
        self.battery = "100%"
        self.temperature = "25°C"
        self.esp_ip = "192.168.0.128"  # IP de l’ESP8266

    def move(self, direction):
        self.direction = direction
        try:
            url = f"http://{self.esp_ip}/cmd?act={direction}"
            response = requests.get(url, timeout=2)
            print(f"ESP répond : {response.text}")
        except Exception as e:
            print("Erreur lors de l’envoi à l’ESP :", e)

    def get_status(self):
        return {
            "direction": self.direction,
            "battery": self.battery,
            "temperature": self.temperature
        }
