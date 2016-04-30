def knapsack(items, values, capacity):
    result = []
    table = [[0 for i in range(capacity+1)] for i in range(len(items)+1)]

    for i in range(1, len(items)+1):
        for c in range(1, capacity+1):
            if items[i-1] > c:
                table[i][c] = table[i - 1][c]
            else:
                table[i][c] = max(values[i - 1] + table[i - 1][c - items[i - 1]], table[i - 1][c])

    for i in range(len(items), 0, -1):
        if table[i][capacity] != table[i-1][capacity]:
            result.append(items[i-1])
            capacity -= items[i-1]
    return table[-1][-1], result

v = [27, 10, 12, 37, 15]
w = [3, 8, 5, 1, 4]
W = 17

r = knapsack(w, v, W)
print("result: ", r[0])
print("items: ", r[1])
