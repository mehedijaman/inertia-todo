import { ref, reactive, computed } from 'vue';

const todo =  reactive({
    items: [],
    pendings: computed(() => {
        return todo.items.filter(todo => todo.completed_at == null);
    }),
    completeds: computed(() => {
        return todo.items.filter(todo => todo.completed_at != null);
    }),
    totalPending: computed(() => {
        return todo.pendings.length;
    }),
    totalCompleted: computed(() => {
        return todo.completeds.length;
    }),
    add(todo){
        todo.todo.push(todo);
    },
    remove(index){
        todo.items.splice(index, 1);
    },
})


export default todo;
