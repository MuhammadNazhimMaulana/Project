class Node {
    constructor(position, weight, isFinish) {
        this.position = position;
        this.weight = (weight == null ? Number.MAX_SAFE_INTEGER : weight);
        this.isFinish = isFinish || false;
        this.prev = null;
        this.visited = false;
    }
}

class Dijkstra {
    constructor(maxCol, maxRow) {
        this.maxCol = maxCol;
        this.maxRow = maxRow;
    }

    predict(body, food) {
        let head = body[0];
        let nodes = this.initializeGraph(body, food);
        let finish_node;
        while(true) {
            let lowest_idx = this.getLowestWeight(nodes);
            if(lowest_idx == -1) break;
            let lowest_node = nodes[lowest_idx];
            let neightbors_indices = this.getNeighbors(lowest_node.position, nodes);
            nodes[lowest_idx].visited = true;
            if(lowest_node.isFinish) {
                finish_node = lowest_node;
                break;
            }
        
            for(let i = 0; i<neightbors_indices.length; i++) {
                let idx = neightbors_indices[i];
                let alt = lowest_node.weight + 1;
                if(alt < nodes[idx].weight) {
                    nodes[idx].weight = alt;
                    nodes[idx].prev = lowest_node.position;
                }
            }
        }
        
        let S = [];
        let u = finish_node;
        if(u != null && u.prev != null 
            && u.position.x != head.x || u.position.y != head.y
            && u.position.x == food.x && u.position.y == food.y) {
                S.unshift(u.position);
                let idx = this.findNode(u.prev, nodes);
                while(idx > 0) {
                    u = nodes[idx];
                    S.unshift(u.position)
                    idx = this.findNode(u.prev, nodes);
                }
            } else {
                return null;
            }
        // fill(0, 255, 0)
        // S.forEach(s => drawBox(s.x, s.y))
        let next_position = S[0];
        let next_direction = new Vector(next_position.x - head.x, next_position.y - head.y)
        return next_direction
    }

    findNode(position, nodes) {
        if(position == null) return -1
        return nodes.findIndex(node => node.position.x == position.x && node.position.y == position.y);
    }

    getLowestWeight(nodes) {
        let lowest = nodes.findIndex(node => !node.visited)
        if(lowest == -1) return lowest;
        for(let i = 1; i<nodes.length; i++) {
            if(nodes[i].weight < nodes[lowest].weight && !nodes[i].visited) {
                lowest = i;
            }
        }
        return lowest;
    }

    initializeGraph(body, food) {
        let nodes = [];
        let head = body[0];
        nodes.push(new Node(new Vector(head.x, head.y), 0));
        nodes.push(new Node(new Vector(food.x, food.y), null, true));
        for(let x = 0; x<this.maxCol; x++) {
            for(let y = 0; y<this.maxRow; y++) {
                let found = body.find(box => box.x == x && box.y == y);
                if(!found) {
                    nodes.push(new Node(new Vector(x, y)));
                }
            }
        }
        return nodes;
    }

    getNeighbors(position, nodes) {
        let left = new Vector(position.x - 1, position.y);
        let right = new Vector(position.x + 1, position.y);
        let up = new Vector(position.x, position.y - 1);
        let down = new Vector(position.x, position.y + 1);

        let neighbors = [left, right, up, down];
        let neighbors_indices = [];
        neighbors.forEach(neighbor => {
            let idx = nodes.findIndex(node => (node.position.x == neighbor.x && node.position.y == neighbor.y && !node.visited))
            if(idx != -1) {
                neighbors_indices.push(idx)
            }
        })

        return neighbors_indices;
    }
}