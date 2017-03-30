<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <a :href="path">
                {{reply.user.name}}
            </a>
            said {{reply.createdAt}} ... </div>


        <div class="panel-body">
            <article>
                <div class="body">{{reply.body}}</div>
            </article>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['reply'],
        computed: {
            path: function () {
                return '/users/' + this.reply.user.id;
            }
        },
    }
</script>
