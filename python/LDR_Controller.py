import spidev
import time
import os

class LDR_Controller:

    # Define LUX_CALC_SCALAR 
    LUX_CALC_SCALAR = 12518931
    LUX_CALC_EXPONENT = -1.405
    REF_RESISTANCE = 5030

    def __init__(self):
        # open(bus, device) : open(X,Y) will open /dev/spidev-X.Y
        self.spi = spidev.SpiDev()
        self.spi.open(0,0)
        # Define sensor channels
        self.light_ch = 0

        # Define delay between readings
        self.delay = 3

        

    # Read SPI data from MCP3008, Channel must be an integer 0-7
    def ReadADC(self, ch):
        if ((ch > 7) or (ch < 0)):
            return -1
        adc = self.spi.xfer2([1,(8+ch)<<4,0])
        data = ((adc[1]&3)<<8) + adc[2]
        return data

    # Convert data to voltage level
    def ReadVolts(self, data, deci):
        volts = (data * 3.3) / float(1023)
        volts = round(volts,deci)
        return volts

    def getLux(self):
        ldrRawData = self.ReadADC(self.light_ch)
        resistorVoltage = self.ReadVolts(ldrRawData, 2)
        ldrVoltage = 3.3 - resistorVoltage
        ldrResistance = ldrVoltage / resistorVoltage * self.REF_RESISTANCE
        ldrLux = self.LUX_CALC_SCALAR * pow(ldrResistance, self.LUX_CALC_EXPONENT)
        return ldrLux

    def main(self):
        while True:
            # Read the light sensor data
            light_data = self.ReadADC(self.light_ch)
            light_volts = self.ReadVolts(light_data,2)

            # Print out results
            print ("Light : ",light_data," (",light_volts,"V)")

            # Delay seconds
            time.sleep(self.delay)

if __name__ == "__main__":
    light = getLight()
    light.main()
