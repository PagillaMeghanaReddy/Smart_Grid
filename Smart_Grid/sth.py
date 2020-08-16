import sys
import numpy as np

def my_algo(cost, probability, n, D, C):
    output = np.zeros(n)
    pot_cost = np.zeros(n)
    for i in range(n):
        pot_cost[i] = C*probability[i] - cost[i]/2
    sorted_index = np.argsort(-pot_cost)
    sum1 = 0
    #print(sorted_index)
    for i in sorted_index:
        if(cost[i]/2 < C*(-sum1+D-1/2)):
            output[i] = 1
            sum1 = sum1 + probability[i]
    return output


cost = sys.argv[1];
probability = sys.argv[2];
n = sys.argv[3];
D = sys.argv[4];
C = sys.argv[5];

output = my_algo(cost, probability, n, D, C)
# print (cost)
# print (probability)
# print (n)
# exit (D)
print (C)
# print (output) 
# return output