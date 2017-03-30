<template>
    <div>
        <reply :reply="reply" v-for="reply in replies"></reply>
    </div>
</template>

<script>
export default {
    props: ['thread'],
    data: () => {
        return {
            replies: []
        }
    },
    created() {
        this.getReplies();
        this.listenForReplies();
    },
    methods: {
        getReplies() {
          axios.get(`/threads/${this.thread}/replies/`, {})
                .then((response) => {
                        this.replies= response.data;
                });
        },
        listenForReplies() {
            Echo.private('replies.' + this.thread)
                .listen('ReplyAdded', (e) => {
                    this.replies = e.replies;
                });
        }

    }
}
</script>
